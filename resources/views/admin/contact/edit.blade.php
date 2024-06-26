@extends('adminlte::page')
@section('title', 'Edit Contact')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Contact</h1>
    </div>

    <form method="post" action="{{ route('admin_contact_update', $contact->id) }}" class="mr-5 ml-5">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $contact->first_name }}" class="form-control">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $contact->last_name }}" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="{{ $contact->email }}" class="form-control">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" value="{{ $contact->phone }}" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" id="designation" class="form-control" value="{{ $contact->designation }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="city_id">City:</label>
                        <select class="form-control" id="city_id" name="city_id">
                            @if($contact->city)
                            <option value="{{ $contact->city->id }}" selected>{{ $contact->city->name }}</option>
                            @else
                            <option>Select City</option>
                            @endif
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
                            @if($contact->state)
                            <option value="{{ $contact->state->id }}" selected>{{ $contact->state->name }}</option>
                            @else
                            <option>Select State</option>
                            @endif
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
                            @if($contact->country)
                            <option value="{{ $contact->country->id }}" selected>{{ $contact->country->name }}</option>
                            @else
                            <option>Select Country</option>
                            @endif
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
                            @if($contact->company)
                            <option value="{{ $contact->company->id }}" selected>{{ $contact->company->name }}</option>
                            @else
                            <option>Select Company</option>
                            @endif
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
                        <input type="text" name="address" id="address" class="form-control" value="{{ $contact->address }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-block btn-primary mt-4">Update Contact</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@stop