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

            <div class="mb-3">
                <label for="title" class="label-control">Titolo*</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $edit_post->title) }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="content" class="label-control">Contenuto*</label>
                <textarea class="form-control" name="content" id="content">{{ old('content', $edit_post->content) }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn btn-primary" type="submit">Modifica il post</button>
        </form>
    </div>
    
@endsection