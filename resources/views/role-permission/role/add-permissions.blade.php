@extends('adminlte::page')
@section('title', 'Add Permission')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{ $role->name }}

                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="">Permissions</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-md-2">
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }} />
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mt-4 row justify-content-cente">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop