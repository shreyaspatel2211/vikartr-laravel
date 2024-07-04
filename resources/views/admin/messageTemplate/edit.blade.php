@extends('adminlte::page')
@section('title', 'Edit Message Template')
@section('content')

<div class="card mr-5 mt-5 ml-5">
    <div class="mt-3 ml-5 mb-3 font-weight-bold">
        <h1>Edit Message Template</h1>
    </div>

    <form method="post" action="{{ route('mesaage_templates.update', $messageTemplate->id) }}" class="mr-5 ml-5">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $messageTemplate->title }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <!-- Custom switch button for status -->
                    <div class="custom-control custom-switch custom-switch-lg">
                    <input type="hidden" name="status" value="inactive">
                        <!-- Checkbox to reflect status -->
                        <input type="checkbox" class="custom-control-input" id="statusSwitch" name="status" value="active" {{ $messageTemplate->status == 'active' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="statusSwitch">Active</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="json">Json:</label>
            <!-- Make CKEditor visible by default -->
            <textarea class="form-control" id="json" name="json">{{ $messageTemplate->json }}</textarea>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 mt-4 row justify-content-cente">Update Message Template</button>
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

        // Event listener for switch change
        statusSwitch.addEventListener('change', function() {
            updateStatus();
        });
    });
</script>
@stop