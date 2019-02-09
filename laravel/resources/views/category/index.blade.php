@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-4">Category list - edit</h1>
        <table class="table table-hover mt-4 mb-4">
            <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><a href="{{ route('app_homepage', ['category'=> $category->id]) }}">{{ $category->label }}</a>
                    </td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('app_category_edit', $category->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                        <form action="{{ url('/categories', ['id' => $category->id]) }}" method="post">
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
                <td colspan="3">
                    <a href="{{ route('app_category_add') }}" class="btn btn-primary btn-sm">New category</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection