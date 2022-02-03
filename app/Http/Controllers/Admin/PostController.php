<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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

        $data = $request->all();

        // Crea nuovo post
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

        if (! $edit_post) {
            abort(404);
        }

        return view('admin.posts.edit', compact('edit_post'));
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
            'content' => 'required'
        ];
    }

    /**
     * Validate error messages
     */
    private function validation_messages() {
        return [
            'required' => 'È necessario compilare il campo ":attribute".',
            'max' => 'Limite massimo di caratteri per il campo ":attribute": :max.'
        ];
    }
}
