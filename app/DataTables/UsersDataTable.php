<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'users.action')
            ->setRowId('id');
    }

    /**
     * Query do codigo do datatables.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->select('*')->where('nivel','<', Auth::user()->nivel);
    }

    /**
     * Métodos opcionais se vc utilizar o html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
                        'language' => ['url' => url('https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-PT.json')],
                    ])
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Colunas da tabela gerenciada pelo DataTables.
     */
    public function getColumns(): array
    {
        return [
            /*Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),*/
            Column::make('id')->title('ID'),
            Column::make('name')->title('Nome'),
            Column::make('email')->title('Email'),
        ];
    }

    /**
     * Nome do arquivo de exportação.
     */
    protected function filename(): string
    {
        return 'Usuarios_' . date('YmdHis');
    }
}
