<?php

namespace App\DataTables;

use App\Models\EmailTemplate;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmailTemplateDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                $editUrl = route('email_templates.edit', $row->id);
                $deleteUrl = route('email_templates.destroy', $row->id);
                $csrfToken = csrf_token();
                return <<<HTML
                    <a href="$editUrl" class="btn btn-sm btn-primary">Edit</a>
                    <form action="$deleteUrl" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="$csrfToken">
                        <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                HTML;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EmailTemplate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmailTemplate $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('emailtemplate-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('title'),
            Column::make('subject'),
            Column::make('json'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'EmailTemplate_' . date('YmdHis');
    }
}