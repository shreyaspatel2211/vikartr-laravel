<?php

namespace App\DataTables;

use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LeaveDataTable extends DataTable
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
            ->addColumn('user_name', function ($row){
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('leaves.edit', $row->id);
                $deleteUrl = route('leaves.destroy', $row->id);
                $approveUrl = route('leave_approve', $row->id);
                $csrfToken = csrf_token();
                 /** @var User $user */
                $user = auth()->user();
                $approveButton = '';
                
                if ($user->hasRole('super-admin')) {
                    $approveButton = <<<HTML
                        <form action="$approveUrl" method="POST" style="display:inline;">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="$csrfToken">
                            <button type="submit" class="btn btn-sm btn-success mt-1" onclick="return confirm('Are you sure you want to approve this leave?')">Approve</button>
                        </form>
                    HTML;
                }
                return <<<HTML
                    <a href="$editUrl" class="btn btn-sm btn-primary">Edit</a>
                    <form action="$deleteUrl" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="$csrfToken">
                        <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    
                        $approveButton
                    
                    
                HTML;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Leave $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Leave $model)
    {
         /** @var User $user */         
        $user = auth()->user();
        if ($user->hasRole('super-admin')) {
            // Return all records
            return $model->newQuery();
        } else {
            // Return records for the current user
            return $model->newQuery()->where('user_id', $user->id);
        }
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
                    ->setTableId('leave-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [ 
            Column::computed('user_name')
            ->title('User Name')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
            Column::make('leave_type'),
            Column::make('duration'),
            Column::make('from'),
            Column::make('to'),
            Column::make('note'),
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
        return 'Leave_' . date('YmdHis');
    }
}
