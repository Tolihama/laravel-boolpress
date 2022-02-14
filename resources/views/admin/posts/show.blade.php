@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <div class="post-options py-4">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning me-2">Edit</a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna all'archivio</a>
        </div>


        <article class="post-details pt-5 px-5 pb-4">
            {{-- Post Title --}}
            <h3 class="fw-bold">{{ $post->title }}</h3>

            <div class="post-info py-2 mb-2 d-flex align-items-center">
                {{-- Post Category --}}
                @if ($post->category)
                    <span class="cat badge bg-primary p-2 mr-3">{{ $post->category->name }}</span>
                @else
                    <span class="cat badge bg-secondary p-2 mr-3">Uncategorized</span>
                @endif

                {{-- Post date --}}
                <span>{{ $post->formatted_date }}</span>
            </div>

            {{-- Post image --}}
            @if ($post->cover)
                <figure>
                    <img src="{{ asset("storage/{$post->cover}") }}" alt="Cover {{ $post->title }}">
                </figure>
            @endif

            {{-- Post content --}}
            <div class="post-content py-4">
                {{ $post->content }}
            </div>

            {{-- Post tags --}}
            @if (!$post->tags->isEmpty())
                <div class="post-tags">
                    Tag:
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif

        </article>
    </div>
@endsection