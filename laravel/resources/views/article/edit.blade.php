@extends('layouts.app')
@section('title', 'Edit article |')
@section('content')
    <div class="container">
        <h1 class="py-4">Edit article</h1>
        <form class="mt-4 mb-4" method="POST" action="{{ route('app_article_update', $article->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputTitle" placeholder="Some title"
                       value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="exampleSelect">Category</label>
                <select name="category_id" class="form-control" id="exampleSelect">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $article->category->id ? 'selected' : ''}}>{{ $category->label}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputContent">Content</label>
                <textarea name="content" class="form-control" id="exampleInputContent" placeholder="Some text" rows="3">{{ $article->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>
@endsection