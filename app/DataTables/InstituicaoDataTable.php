<?php

namespace App\DataTables;

use App\Models\Instituicao;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InstituicaoDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('editar', function($row){
            $editUrl = route('instituicao.edit', $row->id);
            $editButton = '<a href="' . $editUrl . '" class="btn btn-sm btn-outline-success mr-2"><i class="bi bi-pencil"></a>';
            return $editButton;
        })
        ->addColumn('delete', function ($row) {                
            $deleteUrl = route('instituicao.destroy', $row->id);
            $deleteButton = '<form action="' . $deleteUrl . '" method="POST">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </form>';

            return $deleteButton;
        })
        ->rawColumns(['editar','delete'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Instituicao $model): QueryBuilder
    {
        return $model->newQuery()->select('*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('instituicao-table')
                    ->columns($this->getColumns())
                    ->parameters([
                        'language' => ['url' => url('https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-PT.json')],
                    ])
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        Button::make('pdf'),
                        Button::make('print'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('nome')->title('Nome'),
            Column::make('cnpj')->title('CNPJ'),
            Column::make('data_fundacao')->title('Inicio'),
            Column::make('descricao')->title('Descrição'),
            Column::make('responsavel')->title('Reitor(a)'),
            Column::make('endereco')->title('Endereço'),
            Column::computed('editar')
              ->exportable(false)
              ->printable(false)
              ->width(10)
              ->addClass('text-center')
              ->title(''),
            Column::computed('delete')
              ->exportable(false)
              ->printable(false)
              ->width(10)
              ->addClass('text-center')
              ->title('')  
              /*->render(function ($row) {
              $editUrl = route('instituicao.edit', ['id' => $row->id]);
                  $deleteUrl = route('instituicao.destroy', ['id' => $row->id]);

                  $editButton = '<a href="' . $editUrl . '" class="btn btn-sm btn-primary mr-2">Editar</a>';
                  $deleteButton = '<form action="' . $deleteUrl . '" method="POST" style="display:inline">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                      <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                  </form>';

                  return $editButton . $deleteButton;
              })->rawColumns(['action']),*/
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Instituicao_' . date('YmdHis');
    }
}
