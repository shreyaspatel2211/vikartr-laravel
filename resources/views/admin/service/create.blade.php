@extends('adminlte::page')
@section('title', 'Add Service')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
@stop

<div class="card mr-5 mt-5 ml-5">

    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Service</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('admin_services.store') }}" method="POST" enctype="multipart/form-data" class="mr-5 ml-5">
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
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="image">Image:</label><br>
                    <input type="file" name="image" accept="image/*">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="streams">Streams:</label>
                    <select name="streams[]" id="streams" class="form-control" multiple required>
                        <option value="Node JS">Node JS</option>
                        <option value="React JS">React JS</option>
                        <option value="Open AI">Open AI</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="long_description">Long Description:</label>
            <textarea class="form-control" id="long_description" name="long_description"></textarea>
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
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#long_description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#streams').select2();
    });
</script>

@stop