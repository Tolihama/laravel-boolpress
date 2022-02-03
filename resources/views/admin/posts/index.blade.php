@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h2 class="mb-3">Posts List</h2>
        <div class="py-3 mb-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
        </div>
    
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
                            <td>
                                <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-success">Show</a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
    
@endsection