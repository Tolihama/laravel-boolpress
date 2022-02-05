@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h1>Modifica il post</h1>

        <div class="post-options py-4">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna all'archivio</a>
        </div>

        {{-- Error list --}}
        @if ($errors->any()) 
            <div class="alert alert-danger">
                <ul class="py-0 my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Create new post form --}}
        <form action="{{ route('admin.posts.update', $edit_post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="label-control">Titolo*</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $edit_post->title) }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="label-control">Contenuto*</label>
                <textarea class="form-control" name="content" id="content">{{ old('content', $edit_post->content) }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Categories --}}
            <div class="mb-3">
                <label for="category_id" class="label-control">Categoria:</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Uncategorized</option>
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            @if($category->id == old('category_id', $edit_post->category_id)) selected @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tags --}}
            <div class="mb-3">
                <h4>Tags</h4>
                @foreach ($tags as $tag)
                    <span class="d-inline-block form-check mr-3">
                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                            @if($errors->any() && in_array($tag->id, old('tags'))) 
                                checked 
                            @elseif(!$errors->any() && $edit_post->tags->contains($tag->id))
                                checked
                            @endif>
                            
                        <label for="tag{{ $loop->iteration }}">
                            {{ $tag->name }}
                        </label>
                    </span>
                @endforeach
                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Modifica il post</button>
        </form>
    </div>
    
@endsection