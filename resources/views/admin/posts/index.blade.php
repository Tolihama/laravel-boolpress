@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h2 class="mb-3">Posts List</h2>
        <div class="py-3 mb-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
        </div>

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>"{{ session('deleted') }}"</strong> è stato cancellato.
            </div>
        @endif
    
        @if ($posts->isEmpty())
            <p>No posts found. <a href="{{ route('admin.posts.create') }}">Create a new one</a>.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
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