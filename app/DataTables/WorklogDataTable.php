<?php

namespace App\DataTables;

use App\Models\Worklog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WorklogDataTable extends DataTable
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
            ->addColumn('project_name', function ($row){
                return $row->project->name;
            })
            ->addColumn('user_name', function ($row){
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('admin_worklog_edit', $row->id);
                $deleteUrl = route('admin_worklog_delete', $row->id);
                $csrfToken = csrf_token();
                $today = now()->toDateString();
    
                if ($row->date == $today) {
                    return <<<HTML
                        <a href="$editUrl" class="btn btn-sm btn-primary">Edit</a>
                        <form action="$deleteUrl" method="POST" style="display:inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="$csrfToken">
                            <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    HTML;
                } else {
                    return <<<HTML
                        <button class="btn btn-primary rounded mr-3" disabled>Edit</button>
                        <button class="btn btn-danger mt-1" disabled>Delete</button>
                    HTML;
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Worklog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Worklog $model)
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
                    ->setTableId('worklog-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('project_name')
            ->title('Project Name')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::computed('user_name')
            ->title('User Name')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::make('date'),
            Column::make('description'),
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
        return 'Worklog_' . date('YmdHis');
    }
}
