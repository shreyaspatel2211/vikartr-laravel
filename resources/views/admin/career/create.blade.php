@extends('adminlte::page')
@section('title', 'Add Career')
@section('content')

<div class="card mr-5 mt-5 ml-5">

    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Career</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('admin_careers.store') }}" method="POST" enctype="multipart/form-data" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" name="designation" id="designation" class="form-control" required>
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
                    <label for="experience">Experience:</label>
                    <input type="text" name="experience" id="experience" class="form-control" required>
                </div>

            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="city_id">City:</label>
                    <select class="form-control" id="city_id" name="city_id">
                        <option value="" disabled selected>Select City</option>
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
                        <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Submit</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
@stop