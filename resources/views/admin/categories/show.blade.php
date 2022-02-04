@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h1>Categoria: {{ $category->name }}</h1>
        <div class="py-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Torna alla lista categorie</a>
        </div>

        <div class="my-3">
            @foreach ($category->posts as $post)
                <ul>
                    <li>
                        <a href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->title }}</a>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection