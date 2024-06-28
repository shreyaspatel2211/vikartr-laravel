@extends('adminlte::page')
@section('title', 'Edit User')
@section('content')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Contact</h1>
    </div>

    <form method="post" action="{{ url('users/'.$user->id) }}" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                    </div>  
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                    <label for="roles">Roles:</label>
                        <select name="roles[]" id="roles" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option
                                        value="{{ $role }}"
                                        {{ in_array($role, $userRoles) ? 'selected':'' }}>
                                    
                                        {{ $role }}
                                    </option>
                                    @endforeach
                        </select>
                    </div>  
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-block btn-primary mt-4">Update User</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>            
        </div>
    </form>
</div>
@stop

@section('js')
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#roles').select2();
    });
</script>
@stop
