@extends('layouts.controlpanel')

@section('content')
    <div class="container">
        <h2 class="mb-3">Post Categories List</h2>

        @if ($categories->isEmpty())
            <p>No categories found.</p>
        @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome Categoria</th>
                        <th>Slug</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-success">Show posts</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        @endif

    </div>
    
@endsection