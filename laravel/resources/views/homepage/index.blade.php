@extends('layouts.app')
@section('title', 'Article list - home |')
@section('content')
    <div class="container">
        <h1 class="py-4">Article list - home</h1>
        @foreach($articles as $article)
            <article id="article-{{ $article->id }}" class="mt-4 mb-4">
                <header class="article-header bg-light px-2 py-1">
                    <a href="{{ route('app_article', $article->id) }}">{{ $article->title }}</a> |
                    <a href="{{ route('app_homepage', ['category' => $article->category->id]) }}" class="badge badge-primary"
                       data-toggle="tooltip" data-placement="top" title="{{ $article->category->description }}">{{ $article->category->label }}</a>
                </header>
                <p class="article-content px-2 py-1">{{ $article->content }}</p>
                <footer class="article-footer bg-light text-md-right px-2 py-1">
                    {{ $article->created_at }} - <a href="{{ route('app_homepage', ['author' => $article->user->id]) }}"
                                    class="badge badge-danger">{{ $article->user->username }}</a>
                </footer>
            </article>
        @endforeach
    </div>
@endsection