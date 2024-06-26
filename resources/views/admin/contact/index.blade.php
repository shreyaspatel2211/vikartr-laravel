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
                        <a href="{{ route('admin_contact_create')}}" class="btn btn-primary rounded">New Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="contacts-form" method="POST" action="">
                @csrf
                <input type="hidden" name="select_all" value="no" id="selected_all_hidden">
                <button type="button" id="send-mail-btn" class="btn btn-primary mb-3">Send Mail to Selected</button>
                <button type="button" id="send-message-btn" class="btn btn-primary mb-3">Send Message to Selected</button>
                {{ $dataTable->table() }}
            </form>
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

        $('#send-mail-btn').on('click', function() {
            $('#contacts-form').attr('action', '{{ route("send_contact_mail") }}');
            $('#contacts-form').submit();
        });

        $('#send-message-btn').on('click', function() {
            $('#contacts-form').attr('action', '{{ route("send_contact_message") }}');
            $('#contacts-form').submit();
        });
    });
</script>

@stop
