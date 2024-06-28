@extends('adminlte::page')
@section('title', 'Contacts')
@section('content')

@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    {{ session('error') }}
</div>
@endif

@if(session('completed'))
<div class="alert alert-success alert-dismissible">
    {{ session('completed') }}
</div>
@endif
<div class="card mr-5 mt-5 ml-5">
<form action="{{ route('admin_contacts_import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Import Contacts (CSV/XLSX):</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Import</button>
</form>

</div>

@stop