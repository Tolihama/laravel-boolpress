@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h2 class="mb-3">Posts List</h2>
        <div class="py-3 mb-4 d-flex justify-content-between">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
            <form 
                action="{{ route('admin.posts.destroy', 'truncate') }}" 
                method="POST" 
                onclick="return confirm('Sicuro di voler resettare tutta la tabella? L\'operazione non è reversibile')"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Reset Tabella</button>
            </form>
        </div>

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>"{{ session('deleted') }}"</strong> è stato cancellato.
            </div>
        @endif

        @if (session('truncated'))
            <div class="alert alert-success">
                <strong>"{{ session('truncated') }}"</strong>
            </div>
        @endif
    
        @if ($posts->isEmpty())
            <p>No posts found. <a href="{{ route('admin.posts.create') }}">Create a new one</a>.</p>
        @else
            <div class="d-flex align-items-center mb-4">
                <div class="mr-3">
                    {{ $posts->onEachSide(0)->links() }}
                </div>
                <div>
                    {{ $posts_count }} elementi
                </div>
            </div>

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Categoria</th>
                        <th>Ultima modifica</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if ($post->category)
                                    <a href="{{ route('admin.categories.show', $post->category_id) }}" class="badge text-white bg-primary p-2">{{ $post->category->name }}</a>
                                @else
                                    <span class="badge text-white bg-secondary p-2">Uncategorized</span>
                                @endif
                            </td>
                            <td>{{ $post->updated_at }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-success">Show</a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary mx-3">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
    
@endsection