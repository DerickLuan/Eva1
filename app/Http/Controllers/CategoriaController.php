<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaDataTable;
use App\Models\Categoria;
use Illuminate\Http\Request;

use function Termwind\render;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriaDataTable $datatable)
    {
        return $datatable->render('categoria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nome = $request->input('nome');

            // Verifica se a categoria já existe no banco de dados
            if (Categoria::where('nome', $nome)->exists()) {
                return response()->json(['error' => 'Essa categoria já está registrada.'], 409);
            }

            //Cadastra nova categoria
            $categoria = new Categoria();
            $categoria->nome = $request->nome;
            $categoria->descricao = $request->descricao;

            $categoria->save();
            return redirect()->route('categoria.index');
            //return response()->json(['message' => 'Categoria criada com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao cadastrar a categoria: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        try{             
            return response()->json(['id' => $categoria->id,
                                     'nome' => $categoria->nome,
                                     'cnpj' => $categoria->descricao]);
        } catch(\Exception $e){
            return response()->json(['error' => 'Categoria não encontrada: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        try{
            //Atualiza informações cadastrais da categoria
            $categoria->nome = $request->nome;
            $categoria->categoria = $request->categoria;

            $categoria->save();
            return redirect()->route('categoria.index');
            //return response()->json(['message' => 'Categoria atualizada com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao atualizar a categoria: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try{
            //Deleta a categoria informada.
            $categoria->delete();
            return redirect()->route('categoria.index');
            //return response()->json(['message' => 'Categoria deletada com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao deletar categoria: ' . $e->getMessage()], 500);
        }
    }
}
