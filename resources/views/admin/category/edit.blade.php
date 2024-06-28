@extends('adminlte::page')
@section('title', 'Edit Category')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Category</h1>
    </div>

<form method="post" action="{{ route('categories.update', $category->id) }}" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                </div>
            </div>

            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Update Category</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop

