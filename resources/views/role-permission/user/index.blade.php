@extends('adminlte::page')
@section('title', 'Users')
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
                <h1>Users</h1>
            </div>
            <div class="col-2">
                @can('create user')
                <a href="{{ url('users/create') }}" class="btn btn-primary">New User</a>
                @endcan
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>

                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames() as $rolename)
                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                    @endforeach
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                    @can('update user')
                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary rounded mr-3">Edit</a>
                        @endcan
                        @can('delete user')
                        <form action="{{ url('users/'.$user->id.'/delete') }}" method="post">
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