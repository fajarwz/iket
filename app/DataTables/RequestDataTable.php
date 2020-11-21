<?php

namespace App\DataTables;

use App\Models\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RequestDataTable extends DataTable
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
            ->addColumn('action', 'request.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Request $model)
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
                    ->setTableId('request-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addColumn('action',function ($data){
                        return $this->getActionColumn($data);
                    });
    }

    protected function getActionColumn($data): string
    {
        $print = route('user.request.print', $data->id);
        return "<a class='waves-effect btn btn-success' data-value='$data->id' href='$print'><i class='material-icons'>visibility</i>Details</a>";
        
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Request_' . date('YmdHis');
    }
}
