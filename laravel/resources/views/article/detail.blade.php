@extends('layouts.app')
@section('title', "$article->title |")
@section('content')
    <div class="container">
        <article id="article-0" class="mt-4 mb-4">
            <header class="article-header bg-light px-2 py-1">
                <h1>
                    <span>{{ $article->title }}</span> |
                    <small><a href="{{ route('app_homepage', ['category'=>$article->category->id]) }}"
                              class="badge badge-primary"
                              data-toggle="tooltip" data-placement="top"
                              title="{{ $article->category->description }}">{{ $article->category->label }}</a>
                    </small>
                </h1>
            </header>
            <p class="article-content px-2 py-1">{{ $article->content }}</p>
            <footer class="article-footer bg-light text-md-right px-2 py-1">
                {{ $article->created_at->format('d.m.Y')  }} - <a href="{{ route('app_homepage', ['author'=>$article->user_id]) }}"
                                                 class="badge badge-danger">{{ $article->user->username }}</a>
            </footer>
        </article>
    </div>
@endsection