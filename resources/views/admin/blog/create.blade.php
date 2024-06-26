@extends('adminlte::page')
@section('title', 'Add Blog')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Blog</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="quote">Quote:</label>
                    <input type="text" name="quote" id="quote" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="question">Question:</label>
                    <input type="text" name="question" id="question" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="long_description">Long Description:</label>
                    <!-- Make CKEditor visible by default -->
                    <textarea class="form-control" id="long_description" name="long_description"></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <!-- Make CKEditor visible by default -->
                    <textarea class="form-control" id="short_description" name="short_description"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="banner_image">Cover Image:</label>
                    <input type="file" name="banner_image" accept="image/*">
                    @error('cover_image')
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
                <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Submit</button>
            </div>
        </div>



    </form>
</div>
@stop

@section('js')


<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#long_description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#short_description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@stop