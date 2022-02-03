@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <div class="post-options py-4">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning me-2">Edit</a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna all'archivio</a>
        </div>


        <article class="post-details p-5">
            <h3 class="fw-bold">{{ $post->title }}</h3>
            <div class="post-content">
                {{ $post->content }}
            </div>
        </article>
    </div>
    
@endsection