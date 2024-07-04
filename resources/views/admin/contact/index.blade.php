@extends('adminlte::page')
@section('title', 'Contacts')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap5.min.css') }}">
@stop

@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    {{ session('error') }}
</div>
@endif

@if(session('completed'))
<div class="alert alert-success alert-dismissible">
    {{ session('completed') }}
</div>
@endif


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h1>Manage Contact</h1>
            </div>
            <div class="col-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('admin_contact_import')}}" class="btn btn-primary mr-3 rounded">Import</a>
                    @can('create contact')
                    <a href="{{ route('admin_contact_create')}}" class="btn btn-primary rounded">New Contact</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form id="contacts-form" method="POST" action="">
            @csrf
            <input type="hidden" name="select_all" value="no" id="selected_all_hidden">
            <button type="button" id="send-mail-to-selected" class="btn btn-primary mb-3" data-toggle="modal" data-target="#templateModal">Send Mail to Selected</button>
            <button type="button" id="send-message-to-selected" class="btn btn-primary mb-3" data-toggle="modal" data-target="#messagetemplateModal">Send Message to Selected</button>
            {{ $dataTable->table() }}
        </form>
    </div>
</div>

<!-- Modal for selecting email template -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-labelledby="templateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="templateModalLabel">Select Email Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to select email template -->
                <form id="templateSelectForm">
                    <div class="form-group">
                        <label for="templateSelect">Select Template:</label>
                        <select class="form-control" id="emailTemplateSelect" name="template_id" required>
                            <option value="" disabled selected>Select Template</option>
                            @foreach($emaiTemplates as $emailTemplate)
                            <option value="{{ $emailTemplate->id }}">{{ $emailTemplate->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="send-mail-btn" class="btn btn-primary">Send Mail</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messagetemplateModal" tabindex="-1" aria-labelledby="messagetemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messagetemplateModalLabel">Select Message Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to select email template -->
                <form id="messagetemplateSelectForm">
                    <div class="form-group">
                        <label for="messagetemplateSelect">Select Template:</label>
                        <select class="form-control" id="messageTemplateSelect" name="message_template_id" required>
                            <option value="" disabled selected>Select Template</option>
                            @foreach($messageTemplates as $messageTemplate)
                            <option value="{{ $messageTemplate->id }}">{{ $messageTemplate->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="send-message-btn" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
</div>


@stop

@section('js')
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function() {
        $('#select-all').on('click', function() {
            if (this.checked) {
                $('#selected_all_hidden').val('yes');
            }
            var dataTable = $('#contacts-table').DataTable();
            var allRows = dataTable.rows().nodes();
            $('input[type="checkbox"]', allRows).prop('checked', this.checked);
        });

        $('#contacts-table tbody').on('change', 'input[type="checkbox"]', function() {
            if (!this.checked) {
                var el = $('#select-all').get(0);
                if (el && el.checked && ('indeterminate' in el)) {
                    el.indeterminate = true;
                }
            }
        });

        $('#send-mail-to-selected').on('click', function(event) {
            var selectedContacts = $('#contacts-table tbody input[type="checkbox"]:checked').length;
            if (selectedContacts === 0) {
                alert('Please select at least one contact');
                event.preventDefault();
                event.stopPropagation();
            } else {
                $('#templateModal').modal('show');
            }
        });

        $('#send-message-to-selected').on('click', function(event) {
        var selectedContacts = $('#contacts-table tbody input[type="checkbox"]:checked').length;
        if (selectedContacts === 0) {
            alert('Please select at least one contact');
            event.preventDefault();
            event.stopPropagation();
        } else {
            $('#messagetemplateModal').modal('show');
        }
    });


        $('#send-mail-btn').on('click', function() {
            var templateId = $('#emailTemplateSelect').val();
            if (!templateId) {
                alert('Please select a template');
                return;
            }

            $('<input>').attr({
                type: 'hidden',
                name: 'template_id',
                value: templateId
            }).appendTo('#contacts-form');

            $('#contacts-form').attr('action', '{{ route("send_contact_mail") }}');
            $('#contacts-form').submit();
        });

        $('#send-message-btn').on('click', function() {
        var templateId = $('#messageTemplateSelect').val();
        if (!templateId) {
            alert('Please select a message template');
            return;
        }

        $('<input>').attr({
            type: 'hidden',
            name: 'message_template_id',
            value: templateId
        }).appendTo('#contacts-form');

        $('#contacts-form').attr('action', '{{ route("send_contact_message") }}');
        $('#contacts-form').submit();
    });
    });
</script>

@stop