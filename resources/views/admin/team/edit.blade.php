@extends('adminlte::page')
@section('title', 'Edit Team')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Team</h1>
    </div>

    <form method="post" action="{{ route('teams.update', $team->id) }}" enctype="multipart/form-data" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $team->name }}" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" id="designation" class="form-control" value="{{ $team->designation }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" accept="image/*">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Update Team</button>
                        </div>
                    </div>
                </div> 
            </div>

            
                    
                
    </form>
</div>
@stop
