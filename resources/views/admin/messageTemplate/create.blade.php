@extends('adminlte::page')
@section('title', 'Add Message Template')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stop

@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="row">
        <div class="col-6">
            <div class="mt-3 ml-5 mb-3 font-weight-bold">
                <h1>Add Message Template</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('mesaage_templates.store') }}" method="POST" class="mr-5 ml-5">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <!-- Custom switch button for status -->
                    <div class="custom-control custom-switch custom-switch-lg">
                    <div class="custom-control custom-switch custom-switch-lg">
                        <input type="hidden" name="status" value="inactive">
                        <input type="checkbox" class="custom-control-input" id="statusSwitch" name="status" value="active" checked>
                        <label class="custom-control-label" for="statusSwitch">Active</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="json">Json:</label>
            <!-- Make CKEditor visible by default -->
            <textarea class="form-control" id="json" name="json"></textarea>
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
        .create(document.querySelector('#json'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    // JavaScript to update hidden input based on switch state
    // JavaScript to update hidden input based on switch state
    document.addEventListener('DOMContentLoaded', function() {
        const statusSwitch = document.getElementById('statusSwitch');
        const statusInput = document.getElementById('status');
        const statusLabel = document.querySelector('label[for="statusSwitch"]');

        function updateStatus() {
            if (statusSwitch.checked) {
                statusInput.value = 'active';
                statusLabel.textContent = 'Active';
            } else {
                statusInput.value = 'inactive';
                statusLabel.textContent = 'Inactive';
            }
        }

        // Initial update
        updateStatus();

        statusSwitch.addEventListener('change', function() {
            updateStatus();
        });
    });
</script>
@stop