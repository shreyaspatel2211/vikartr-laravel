@extends('adminlte::page')
@section('title', 'Permissions')
@section('content')

@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    {{ session('error') }}
</div>
@endif

@if(session('status'))
<div class="alert alert-success alert-dismissible">
    {{ session('status') }}
</div>
@endif
<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-3 mb-3 font-weight-bold">
        <div class="row">
            <div class="col-8">
                <h1>Permissions</h1>
            </div>
            <div class="col-2">
            @can('create permission')
                <a href="{{ url('permissions/create') }}" class="btn btn-primary">New Permission</a>
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
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
        
                <td class="text-center">
                    <div class="btn-group" role="group">
                        @can('update permission')
                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary rounded mr-3">Edit</a>
                        @endcan
                        @can('delete permission')
                        <form action="{{ url('permissions/'.$permission->id.'/delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
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

