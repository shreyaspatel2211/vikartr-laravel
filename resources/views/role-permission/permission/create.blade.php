@extends('adminlte::page')
@section('title', 'Add Permission')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Add Permission</h1>
    </div>

    <form action="{{ url('permissions') }}" method="POST" class="mr-5 ml-5">
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
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4 row justify-content-cente">Submit</button>
                </div>
            </div>
        </div>
            </div>
        </div>

        
        
    </form>
</div>
@stop
