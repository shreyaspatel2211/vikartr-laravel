@extends('adminlte::page')
@section('title', 'Edit Worklogs')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Worklog</h1>
    </div>

<form method="post" action="{{ route('admin_worklog_update', $worklog->id) }}" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="form-group">
        <label for="project_name">Project Name:</label>
        <select class="form-control" id="project_id" name="project_id">
            <option value="{{ $worklog->project->id }}" selected>{{ $worklog->project->name }}</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ $worklog->description }}</textarea>
    </div>
            <br>
            <button type="submit" class="btn btn-block btn-primary">Update Worklog</button>
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
