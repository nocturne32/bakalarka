@extends('layouts.app')

@section('content')

    @foreach($articles as $article)
        <li>{{ $article->title }}</li>
    @endforeach

@endsection()