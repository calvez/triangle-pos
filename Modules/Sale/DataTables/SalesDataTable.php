<?php

namespace Modules\Sale\DataTables;

use Modules\Sale\Entities\Sale;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SalesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('total_amount', function ($data) {
                return format_currency($data->total_amount);
            })
            ->addColumn('paid_amount', function ($data) {
                return format_currency($data->paid_amount);
            })
            ->addColumn('due_amount', function ($data) {
                return format_currency($data->due_amount);
            })
            ->addColumn('status', function ($data) {
                return view('sale::partials.status', compact('data'));
            })
            ->addColumn('payment_status', function ($data) {
                return view('sale::partials.payment-status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('sale::partials.actions', compact('data'));
            });
    }

    public function query(Sale $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('sales-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                'tr' .
                                <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(8)
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
            Column::make('reference')->title('Referencia')
                ->className('text-center align-middle'),

            Column::make('customer_name')
                ->title('Vevő')
                ->className('text-center align-middle'),

            Column::computed('status')->title('Státusz')
                ->className('text-center align-middle'),

            Column::computed('total_amount')->title('Végösszeg')
                ->className('text-center align-middle'),

            Column::computed('paid_amount')->title('Fizetve')
                ->className('text-center align-middle'),

            Column::computed('due_amount')->title('Hátralék')
                ->className('text-center align-middle'),

            Column::computed('payment_status')->title('Fizetési státusz')
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
        return 'Sales_' . date('YmdHis');
    }
}
