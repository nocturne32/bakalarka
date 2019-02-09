@extends('layouts.app')
@section('title', 'Article list - edit |')
@section('content')
    <div class="container">
        <h1 class="py-4">Article list - edit</h1>
        <table class="table table-hover mt-4 mb-4">
            <thead class="bg-light">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td><a href="{{ route('app_article', $article->id) }}">{{ $article->title }}</a></td>
                    <td>
                        <a href="{{ route('app_homepage', ['author'=>$article->user->id]) }}">{{ $article->user->username }}</a>
                    </td>
                    <td>
                        <a href="{{ route('app_homepage', ['category'=>$article->category->id]) }}">{{ $article->category->label }}</a>
                    </td>
                    <td>
                        <a href="{{ route('app_article_edit', $article->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                        {{--<a href="{{ route('app_article_delete', $article->id) }}" class="btn btn-danger btn-sm">--}}
                            {{--<i class="fas fa-trash-alt"></i>&nbsp;Delete</a>--}}
                        <form action="{{ url('/articles', ['id' => $article->id]) }}" method="post">
                            <button class="btn btn-danger btn-sm" type="submit" value="Delete">
                                <i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="bg-light">
            <tr>
                <td colspan="4">
                    <a href="{{ route('app_article_add') }}" class="btn btn-primary btn-sm">New article</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection