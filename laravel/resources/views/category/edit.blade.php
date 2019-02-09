@extends('layouts.app')
@section('title', 'Edit category |')
@section('content')
    <div class="container">
        <h1 class="py-4">Edit category</h1>
        <form class="mt-4 mb-4" method="POST" action="{{ route('app_category_update', $category->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="exampleInputLabel">Label</label>
                <input name="label" type="text" class="form-control" id="exampleInputLabel" placeholder="Some label" value="{{ $category->id }}">
            </div>
            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea name="description" class="form-control" id="exampleInputDescription"
                          placeholder="Some description" rows="3">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>


@endsection