@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{$curso->nome}}</div>
            <div class="card-body">
                <form method="POST" action="{{route('curso.update', $curso->id)}}">
                    @method('put')
                    @csrf
                    <div class="card">
                      <div class="card-body">

                        <div class="mb-3">
                          <label for="nome" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="ajuda" 
                          value="{{$curso->nome}}">
                          <div id="ajuda" class="form-text">Informe o nome do curso.</div>
                        </div>

                        <div class="mb-3">
                          <label for="carga" class="form-label">Carga Horaria</label>
                          <input type="text" class="form-control" id="carga" name="carga_horaria" 
                          value="{{$curso->carga_horaria}}">
                          <div id="ajuda" class="form-text">Informe o carga horaria do curso</div>
                        </div>

                        <div class="mb-3">
                          <label for="descricao" class="form-label">Descrição</label>
                          <input type="text" class="form-control" id="descricao" name="descricao"
                          value="{{$curso->descricao}}">
                          <div id="ajuda" class="form-text">Informe a descrição do curso.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="categoria">Categoria</label>
                            <select class="form-select" name="categoria" id="categoria">
                                <option value="{{$curso->categoria->id}}">{{$curso->categoria->nome}}</option>
                            @forelse($categorias as $categoria)
                                @if ($categoria->id != $curso->categoria->id)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endif
                            @empty
                                <option value="">Nenhuma categoria registrada.</option>
                            @endempty
                            </select>
                        </div>
                        
                        <input type="hidden" name="instituicao" value="{{$curso->instituicao->id}}">

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