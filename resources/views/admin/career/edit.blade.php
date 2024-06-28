@extends('adminlte::page')
@section('title', 'Edit Career')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
@stop


<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Service</h1>
    </div>

    <form method="post" action="{{ route('admin_careers.update', $career->id) }}" enctype="multipart/form-data" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" id="designation" value="{{ $career->designation }}" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" name="slug" id="slug" value="{{ $career->slug }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="experience">Experience:</label>
                        <input type="text" name="experience" id="experience" value="{{ $career->experience }}" class="form-control" required>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="city_id">City:</label>
                        <select class="form-control" id="city_id" name="city_id">
                            @if($career->city)
                            <option value="{{ $career->city->id }}" selected>{{ $career->city->name }}</option>
                            @else
                            <option>Select City</option>
                            @endif
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
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
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Update Career</button>
                        </div>
                    </div>
                </div>
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