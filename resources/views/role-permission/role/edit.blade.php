@extends('adminlte::page')
@section('title', 'Update Role')
@section('content')


<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Update Role</h1>
    </div>

    <form action="{{ url('roles/'.$role->id) }}" method="POST" class="mr-5 ml-5">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mt-4 row justify-content-cente">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop