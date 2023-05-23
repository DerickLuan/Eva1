@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Curso</div>
            <div class="card-body">
                <form method="POST" action="{{route('categoria.store')}}">
                    @csrf
                    <div class="card">
                      <div class="card-body">

                        <div class="mb-3">
                          <label for="nome" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="ajuda">
                          <div id="ajuda" class="form-text">Informe o nome da categoria.</div>
                        </div>

                        <div class="mb-3">
                          <label for="descricao" class="form-label">Descrição</label>
                          <input type="text" class="form-control" id="descricao" name="descricao">
                          <div id="ajuda" class="form-text">Informe a descrição da categoria</div>
                        </div>

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