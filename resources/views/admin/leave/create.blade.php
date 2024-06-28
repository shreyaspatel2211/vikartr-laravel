@extends('adminlte::page')
@section('title', 'Add Leave')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

<div class="card mr-5 mt-5 ml-5">
    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Leave</h1>
            </div>
        </div>
    </div>

    <form action="{{ route('leaves.store') }}" method="POST" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="leave_type">Leave Type:</label>
                    <select class="form-control" id="leave_type" name="leave_type">
                        <option value="" disabled selected>Select Leave Type</option>
                        <option value="Paid">Paid</option>
                        <option value="Unpaind">Unpaid</option>
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
                    <option value="First Half Day">First Half Day</option>
                    <option value="Last Half Day">Last Half Day</option>
                    <option value="Single Day">Single Day</option>
                    <option value="Multiple Day">Multiple Day</option>
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
                        <input type="date" class="form-control" id="from" name="from">
                        @error('from')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="date" class="form-control" id="to" name="to">
                    @error('to')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="note">Note:</label>
            <!-- Make CKEditor visible by default -->
            <textarea class="form-control" id="note" name="note"></textarea>
            @error('note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Submit</button>
            </div>
        </div>
    </form>
</div>
@stop

@section('js')


<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#note'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        document.addEventListener('DOMContentLoaded', function () {
        var durationSelect = document.getElementById('duration');
        var fromToSection = document.querySelector('.from-to');

        durationSelect.addEventListener('change', function () {
            var selectedValue = this.value;

            if (selectedValue === 'First Half Day' || selectedValue === 'Last Half Day') {
                fromToSection.style.display = 'none';
                // Clear the date inputs when hiding
                document.getElementById('from').value = '';
                document.getElementById('to').value = '';
            } else {
                fromToSection.style.display = 'flex';
            }
        });

        // Trigger change event to handle the initial state on page load
        durationSelect.dispatchEvent(new Event('change'));
    });
</script>
@stop