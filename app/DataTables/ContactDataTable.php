<?php

namespace App\DataTables;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->setRowId('id')
        ->addColumn('checkbox', function ($row) {
            return '<input type="checkbox" name="contact_ids[]" value="' . $row->id . '">';
        })
        ->addColumn('last_sent_email_time', function ($row) {
            $lastSentEmail = $row->emailLogs()->where('status', 'success')->latest()->first(); 
            return ($lastSentEmail) ? $lastSentEmail->created_at->format('Y-m-d H:i:s') : 'N/A';
        })
        ->addColumn('last_sent_message_time', function ($row) {
            $lastSentMessage = $row->messageLogs()->where('status', 'success')->latest()->first(); 
            return $lastSentMessage ? $lastSentMessage->created_at->format('Y-m-d H:i:s') : 'N/A';
        })
        ->addColumn('company_name', function ($row){
            return $row->company->name;
        })
        ->addColumn('action', function ($row) {
            $editUrl = route('admin_contact_edit', $row->id);
            $deleteUrl = route('admin_contact_delete', $row->id);
            $csrfToken = csrf_token();
            return <<<HTML
                <a href="$editUrl" class="btn btn-sm btn-primary">Edit</a>
                <form action="$deleteUrl" method="POST" style="display:inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="$csrfToken">
                    <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            HTML;
        })
        ->rawColumns(['checkbox', 'action']);
    }
 
    public function query(Contact $model): QueryBuilder
    {
        $query = $model->newQuery();
        return $this->applyScopes($query)
        ->leftJoin('company', 'contact.company_id', '=', 'company.id')
        ->select('contact.*', 'company.name as company_name');
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('contacts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1, 'asc')  // Setting default order by 'first_name' (second column, index 1)
                    ->selectStyleSingle();
    }
 
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
            ->exportable(false)
            ->printable(false)
            ->width(30)
            ->title('<input type="checkbox" id="select-all"> Select All')
            ->addClass('text-center'),
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('designation'),
            Column::computed('company_name')
            ->title('Company Name')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::make('address'),
            Column::computed('last_sent_email_time')
            ->title('Last Sent Email Time')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::computed('last_sent_message_time')
            ->title('Last Sent Message Time')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }
 
    protected function filename(): string
    {
        return 'Contact_'.date('YmdHis');
    }
}
    