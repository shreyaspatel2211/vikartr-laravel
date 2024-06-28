@extends('adminlte::page')

@section('title', 'Edit Leave')

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Leave</h1>
    </div>

    <form method="POST" action="{{ route('leaves.update', $leave->id) }}" class="mr-5 ml-5">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="leave_type">Leave Type:</label>
                    <select class="form-control" id="leave_type" name="leave_type">
                        <option value="" disabled selected>Select Leave Type</option>
                        <option value="Paid" {{ $leave->leave_type == 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Unpaid" {{ $leave->leave_type == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                    </select>
                    @error('leave_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="duration">Leave Duration:</label>
                <select class="form-control" id="duration" name="duration">
                    <option value="" disabled selected>Select Leave Duration Type</option>
                    <option value="First Half Day" {{ $leave->duration == 'First Half Day' ? 'selected' : '' }}>First Half Day</option>
                    <option value="Last Half Day" {{ $leave->duration == 'Last Half Day' ? 'selected' : '' }}>Last Half Day</option>
                    <option value="Single Day" {{ $leave->duration == 'Single Day' ? 'selected' : '' }}>Single Day</option>
                    <option value="Multiple Day" {{ $leave->duration == 'Multiple Day' ? 'selected' : '' }}>Multiple Day</option>
                </select>
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row from-to">
            <div class="col-6">
                <div class="form-group">
                    <div class="form-group">
                        <label for="from">From:</label>
                        <input type="date" class="form-control" id="from" name="from" value="{{ $leave->from }}">
                        @error('from')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="date" class="form-control" id="to" name="to" value="{{ $leave->to }}">
                    @error('to')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="note">Note:</label>
            <!-- Make CKEditor visible by default -->
            <textarea class="form-control" id="note" name="note">{{ $leave->note }}</textarea>
            @error('note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 mt-4">Update Leave</button>
                </div>
            </div>
    </form>
</div>
@stop

@section('js')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#note'))
        .catch(error => console.error(error));

    
</script>
@stop