<?php

namespace App\Http\Controllers\Admin;

// Utilities
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Models
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts_count = Post::all()->count();
        $posts = Post::orderBy('created_at', 'desc')
                ->paginate(15);

        return view('admin.posts.index', compact('posts', 'posts_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione
        $request->validate($this->validation_rules(), $this->validation_messages());

        // Save all data from form
        $data = $request->all();

        // Crea nuovo istanza di Post
        $new_post = new Post();

        // Generazione slug univoco
        $slug = Str::slug($data['title'], '-');
        $count = 1;

        while (Post::where('slug', $slug)->first()) {
            $slug .= '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        // Fill and save
        $new_post->fill($data);
        $new_post->save();

        // Save relation between post and tags in pivot
        if(array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']);
        }

        // Final redirect
        return redirect()->route('admin.posts.show', $new_post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Query for post to edit
        $edit_post = Post::find($id);

        // Categories retrieve
        $categories = Category::all();
        $tags = Tag::all();

        if (! $edit_post) {
            abort(404);
        }

        return view('admin.posts.edit', compact('edit_post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validazione
        $request->validate($this->validation_rules(), $this->validation_messages());

        // Retrieve data from edit form
        $data = $request->all();

        // Retrieve post from db
        $post = Post::find($id);

        // Slug update if title changed
        if ($post->title != $data['title']) {
            $slug = Str::slug($data['title'], '-');
            $count = 1;
    
            while (Post::where('slug', $slug)->first()) {
                $slug .= '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        }
        else {
            $data['slug'] = $post->slug;
        }

        // Update
        $post->update($data);

        // Sync tags
        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        // Redirect
        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_post = Post::find($id);

        $delete_post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $delete_post->title);
    }

    /**
     * Validate rules
     */
    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ];
    }

    /**
     * Validate error messages
     */
    private function validation_messages() {
        return [
            'required' => 'È necessario compilare il campo ":attribute".',
            'max' => 'Limite massimo di caratteri per il campo ":attribute": :max.',
            'category_id.exists' => "L'id della categoria non è valido.",
            'tags.exists' => "C'è almeno un id non valido."
        ];
    }
}
