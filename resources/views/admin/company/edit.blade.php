@extends('adminlte::page')
@section('title', 'Edit Company')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Company</h1>
    </div>

    <form method="post" action="{{ route('companies.update', $company->id) }}" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="{{ $company->category->id }}" selected>{{ $company->category->name }}</option>

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Update Company</button>
                </div>
            </div>
    </form>
</div>
@stop