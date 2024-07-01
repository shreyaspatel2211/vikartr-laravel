@extends('adminlte::page')
@section('title', 'Add Roles')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap5.min.css') }}">
@stop

@section('content')
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
</div>
@endif

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" >
    {{ session('status') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h1>Manage Roles</h1>
            </div>
            <div class="col-4">
                <div class="btn-group" role="group">
                @can('create role')
                    <a href="{{ url('roles/create') }}" class="btn btn-primary rounded">New Role</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $dataTable->table() }}
        
    </div>
</div>


@stop
@section('js')
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@stop