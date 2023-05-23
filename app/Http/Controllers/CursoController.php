<?php

namespace App\Http\Controllers;

use App\DataTables\CursoDataTable;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CursoDataTable $datatable)
    {
        return $datatable->render('instituicao.curso.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instituicao.curso.create', 
        ['categorias' => Categoria::all(), 
        'instituicoes' => Instituicao::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nome = $request->input('nome');

            // Verifica se o curso já existe no banco de dados
            if (Curso::where('nome', $nome)->exists()) {
                return response()->json(['error' => 'Já existe um curso com este nome nesta instituição.'], 409);
            }

            //Cadastra novo curso
            $curso = new Curso();
            $curso->nome = $request->nome;
            $curso->carga_horaria = $request->carga_horaria;
            $curso->descricao = $request->descricao;
            $curso->categoria_id = $request->categoria;
            $curso->instituicao_id = $request->instituicao;

            $curso->save();
            return redirect()->route('curso.index');
            //return response()->json(['message' => 'curso criado com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao cadastrar a curso: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        try{
            // Verifica se a instituição já existe no banco de dados
            if (Curso::where('id', $curso->id)->exists()) {
                
            return response()->json(['ID' => $curso->id,
                                     'Nome' => $curso->nome,
                                     'Carga Horaria' => $curso->carga_horaria,
                                     'Categoria' => $curso->categoria->nome,
                                     'Descrição' => $curso->descricao,
                                     'Instituição' => $curso->instituicao->nome
            ]);}
        } catch(\Exception $e){
            return response()->json(['error' => 'Curso não encontrado: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('instituicao.curso.edit', 
        ['curso' => $curso, 
        'categorias' => Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        try{
            //Atualiza informações cadastrais do curso
            $curso->nome = $request->nome;
            $curso->carga_horaria = $request->carga_horaria;
            $curso->categoria_id = $request->categoria;
            $curso->descricao = $request->descricao;
            $curso->instituicao_id = $request->instituicao;

            $curso->save();
            return redirect()->route('curso.index');
            //return response()->json(['message' => 'Curso atualizado com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao atualizar o curso: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        try{
            //Deleta o curso informado.
            $curso->delete();
            return redirect()->route('curso.index');
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao deletar curso: ' . $e->getMessage()], 500);
        }
    }
}
