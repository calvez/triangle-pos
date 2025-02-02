<?php

namespace Modules\Adjustment\DataTables;

use Modules\Adjustment\Entities\Adjustment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdjustmentsDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return view('adjustment::partials.actions', compact('data'));
            });
    }

    public function query(Adjustment $model)
    {
        return $model->newQuery()->withCount('adjustedProducts');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('adjustments-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                        'tr' .
                                        <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(4)
            ->buttons(
                Button::make('excel')
                    ->text('<i class="bi bi-file-earmark-excel-fill"></i> Excel'),
                Button::make('print')
                    ->text('<i class="bi bi-printer-fill"></i> Nyomtatás'),
                Button::make('reset')
                    ->text('<i class="bi bi-x-circle"></i> Törlés'),
                Button::make('reload')
                    ->text('<i class="bi bi-arrow-repeat"></i> Frissítés')
            );
    }

    protected function getColumns()
    {
        return [
            Column::make('date')->title('Dátum')->title('Dátum')
                ->className('text-center align-middle'),

            Column::make('reference')->title('Referencia')
                ->className('text-center align-middle')
                ->title('Referencia'),

            Column::make('adjusted_products_count')
                ->title('Termék')
                ->className('text-center align-middle'),

            Column::computed('action')->title('Műveletek')
                ->exportable(false)
                ->printable(false)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false),
        ];
    }

    protected function filename(): string
    {
        return 'Adjustments_' . date('YmdHis');
    }
}
