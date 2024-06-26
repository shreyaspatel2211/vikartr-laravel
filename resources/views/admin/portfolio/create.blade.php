@extends('adminlte::page')
@section('title', 'Add Portfolio')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
@stop

<div class="card mr-5 mt-5 ml-5">

    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Portfolio</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" class="mr-5 ml-5">
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
            <div class="col-4">
                <div class="form-group">
                    <label for="sourceType">Source Type:</label>
                    <input type="text" name="sourceType" id="sourceType" class="form-control" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="country_id">Country:</label>
                    <select class="form-control" id="country_id" name="country_id">
                        <option value="" disabled selected>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
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
        <div class="row">

            <div class="col-4">
                <div class="form-group">
                    <label for="source_logo">Source Logo:</label><br>
                    <input type="file" name="source_logo" accept="image/*">
                    @error('source_logo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="country_logo">Country Logo:</label><br>
                    <input type="file" name="country_logo" accept="image/*">
                    @error('country_logo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="image">Image:</label><br>
                    <input type="file" name="image" accept="image/*">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
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
</script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#streams').select2();
    });
</script>

@stop