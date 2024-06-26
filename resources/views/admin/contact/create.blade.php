@extends('adminlte::page')
@section('title', 'Add Contacts')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Add Contact</h1>
    </div>

    <form action="{{ route('admin_store_contact') }}" method="POST" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" name="designation" id="designation" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="city_id">City:</label>
                    <select class="form-control" id="city_id" name="city_id">
                    <option value="" disabled selected>Select City</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="state_id">State:</label>
                    <select class="form-control" id="state_id" name="state_id">
                    <option value="" disabled selected>Select State</option>
                        @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="country_id">Country:</label>
                    <select class="form-control" id="country_id" name="country_id">
                    <option value="" disabled selected>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select class="form-control" id="company_id" name="company_id">
                    <option value="" disabled selected>Select Company</option>
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mt-4 row justify-content-cente">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop