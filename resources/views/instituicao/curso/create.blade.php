@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Curso</div>
            <div class="card-body">
                <form method="POST" action="{{route('curso.store')}}">
                    @csrf
                    <div class="card">
                      <div class="card-body">

                        <div class="mb-3">
                          <label for="nome" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="ajuda">
                          <div id="ajuda" class="form-text">Informe o nome do curso.</div>
                        </div>

                        <div class="mb-3">
                          <label for="carga" class="form-label">Carga Horaria</label>
                          <input type="text" class="form-control" id="carga" name="carga_horaria">
                          <div id="ajuda" class="form-text">Informe o carga horaria do curso</div>
                        </div>

                        <div class="mb-3">
                          <label for="descricao" class="form-label">Descrição</label>
                          <input type="text" class="form-control" id="descricao" name="descricao">
                          <div id="ajuda" class="form-text">Informe a descrição do curso.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="categoria">Categoria</label>
                            <select class="form-select" name="categoria" id="categoria">
                            @forelse($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>                             
                            @empty
                                <option value="">Nenhuma categoria registrada.</option>
                            @endempty
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="instituicao">Instituição</label>
                            <select class="form-select" name="instituicao" id="instituicao">
                            @forelse($instituicoes as $instituicao)
                                <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>                             
                            @empty
                                <option value="">Nenhuma instituição registrada.</option>
                            @endempty
                            </select>
                        </div>

                        <!--<input type="hidden" name="instituicao" value="{{$instituicao->id}}">-->

                      </div>
                      <div class="card-footer">
                        <div class="mb-3">
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection