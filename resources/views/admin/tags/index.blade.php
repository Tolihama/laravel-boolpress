@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h1>Tags</h1>

        @foreach ($tags as $tag)
            <div class="py-3">
                <h2 class="h3">{{ $tag->name }}</h2>
            
                @if ($tag->posts->isEmpty())
                    <p>Non esistono post con questo tag.</p>
                @else
                    <ul>
                        @foreach ($tag->posts as $post)
                            <li>
                                <a href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
    
@endsection