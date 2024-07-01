@extends('adminlte::page')
@section('title', 'Leaves')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap5.min.css') }}">
@stop

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
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h1>Manage Leave</h1>
            </div>
            <div class="col-2">
                <div class="btn-group" role="group">
                @can('create leave')
                    <a href="{{ route('leaves.create')}}" class="btn btn-primary rounded">New Leave</a>
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