<?php

namespace App\DataTables;

use App\Models\Website;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class WebsiteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->addColumn('action', function($row){

            if($row->website_status == 1){
                $temp_btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-update-status="2" data-toggle="collapse" class="editStatus btn btn-danger btn-sm">Deactivate</a>';
            } else {
                $temp_btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-update-status="1" data-toggle="collapse" class="editStatus btn btn-success btn-sm">Activate</a>';
            
            }
            
            $btn = '<a href="/website/campaign" data-id="'.$row->id.'" class="btn btn-info btn-sm mr-2">Campaign</a>';
            $btn = $btn. '<a href="/website/analytics" data-id="'.$row->id.'" class="btn btn-info btn-sm mr-2">Analytics</a>';
            $btn = $btn.$temp_btn;
            

                return $btn;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Website $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Website $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('website-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            'id',
            'user_id',
            'g_view_id',
            'website_name',
            'website_status',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
