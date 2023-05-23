<?php

namespace App\Http\Controllers;

use App\DataTables\InstituicaoDataTable;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InstituicaoDataTable $dataTable)
    {
        return $dataTable->render('instituicao.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instituicao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $cnpj = $request->input('cnpj');

            // Verifica se a instituição já existe no banco de dados
            if (Instituicao::where('cnpj', $cnpj)->exists()) {
                return response()->json(['error' => 'Este CNPJ já em uso por outa instituição.'], 409);
            }

            //Cadastra nova instituição
            $instituicao = new Instituicao();
            $instituicao->nome = $request->nome;
            $instituicao->cnpj = $request->cnpj;
            $instituicao->data_fundacao = $request->data_fundacao;
            $instituicao->descricao = $request->descricao;
            $instituicao->responsavel = $request->responsavel;
            $instituicao->endereco = $request->endereco;

            $instituicao->save();
            return redirect()->route('instituicao.index');
            //return response()->json(['message' => 'Instituição criada com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao cadastrar a instituição: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Instituicao $instituicao)
    {
        try{
            // Verifica se a instituição já existe no banco de dados
            if (Instituicao::where('id', $instituicao->id)->exists()) {
                
            return response()->json(['id' => $instituicao->id,
                                     'nome' => $instituicao->nome,
                                     'cnpj' => $instituicao->cnpj,
                                     'data_fundacao' => $instituicao->data_fundacao,
                                     'descricao' => $instituicao->descricao,
                                     'responsavel' => $instituicao->responsavel,
                                     'endereco' => $instituicao->endereco]);
            }
        } catch(\Exception $e){
            return response()->json(['error' => 'Instituição não encontrada: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instituicao $instituicao)
    {
        return view('instituicao.edit', ['instituicao' => $instituicao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instituicao $instituicao)
    {
        try{
            //Atualiza informações cadastrais da instituição
            $instituicao->nome = $request->nome;
            $instituicao->cnpj = $request->cnpj;
            $instituicao->data_fundacao = $request->data_fundacao;
            $instituicao->descricao = $request->descricao;
            $instituicao->responsavel = $request->responsavel;
            $instituicao->endereco = $request->endereco;

            $instituicao->save();
            return redirect()->route('instituicao.index');
            //return response()->json(['message' => 'Instituição atualizada com sucesso!']);
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao atualizar a instituição: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituicao $instituicao)
    {
        try{
            //Deleta a instituição informada.
            $instituicao->delete();
            return redirect()->route('instituicao.index');
        } catch(\Exception $e){
            return response()->json(['error' => 'Erro ao deletar instituição: ' . $e->getMessage()], 500);
        }
    }
}
