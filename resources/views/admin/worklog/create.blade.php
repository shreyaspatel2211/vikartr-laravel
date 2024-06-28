@extends('adminlte::page')
@section('title', 'Add Worklogs')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop
<div class="card mr-5 mt-5 ml-5">
    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Worklog</h1>
            </div>
        </div>
        @if(auth()->check() && auth()->user()->role_id !== 1)
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Date : {{ date('Y-m-d') }}
                    <h1>
            </div>
        </div>
        @endif
    </div>


    <form action="{{ route('admin_store_worklog') }}" method="POST" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <select class="form-control" id="project_id" name="project_id">
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            @if(auth()->check() && auth()->user()->role_id == 1)
            <div class="col-4">
            <label for="user_id">User Name:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="today_date">Date:</label>
                    <input type="date" class="form-control" id="today_date" name="date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                </div>
            </div>
            @endif

        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <!-- Make CKEditor visible by default -->
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 row justify-content-cente">Submit</button>
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
@stop