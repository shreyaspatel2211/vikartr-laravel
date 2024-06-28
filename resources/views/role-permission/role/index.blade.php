@extends('adminlte::page')
@section('title', 'Add Roles')
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

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-3 mb-3 font-weight-bold">
        <div class="row">
            <div class="col-8">
                <h1>Roles</h1>
            </div>
            <div class="col-2">
            @can('create role')
                <a href="{{ url('roles/create') }}" class="btn btn-primary">New Role</a>
                @endcan
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning mr-3 rounded">
                                            Add / Edit Role Permission </a>
                                            @can('update role')
                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary rounded mr-3">Edit</a>
                        @endcan
                        @can('delete role')
                        <form action="{{ url('roles/'.$role->id.'/delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded" type="submit">Delete</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@stop
