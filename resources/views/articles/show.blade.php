@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a>
        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
