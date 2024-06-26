@extends('adminlte::page')
@section('title', 'Edit project')
@section('css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Project</h1>
    </div>

    <form method="post" action="{{ route('admin_project_update', $project->id) }}" class="mr-5 ml-5">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}"required>
                        </div>  
                    </div>
                    <div class="col-6">
                <div class="form-group">
                    <label for="users">Users:</label>
                    <select name="users[]" id="users" class="form-control" multiple required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $project->users->contains($user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
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
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#users').select2();
    });
</script>
@stop
