@extends('adminlte::page')

@section('title', 'Edit Blog')

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Blog</h1>
    </div>

    <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data" class="mr-5 ml-5">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $blog->name }}" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" value="{{ $blog->author }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="quote">Quote:</label>
                        <input type="text" name="quote" id="quote" value="{{ $blog->quote }}" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question" value="{{ $blog->question }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="long_description">Long Description:</label>
                        <textarea class="form-control" id="long_description" name="long_description">{{ $blog->long_description }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="short_description">Short Description:</label>
                        <textarea class="form-control" id="short_description" name="short_description">{{ $blog->short_description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="banner_image">Banner Image:</label>
                        <input type="file" name="banner_image" accept="image/*">
                        @error('banner_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="icon_image">Icon Image:</label>
                        <input type="file" name="icon_image" accept="image/*">
                        @error('icon_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 mt-4">Update Blog</button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop

@section('js')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#long_description'))
        .catch(error => console.error(error));

    ClassicEditor
        .create(document.querySelector('#short_description'))
        .catch(error => console.error(error));
</script>
@stop