@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Cadastro de Instituições</div>
            <div class="card-body">
                <form method="POST" action="{{route('instituicao.store')}}">
                    @csrf
                    <div class="card">
                      <div class="card-body">

                        <div class="mb-3">
                          <label for="nome" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="ajuda">
                          <div id="ajuda" class="form-text">Informe o nome da instituição.</div>
                        </div>

                        <div class="mb-3">
                          <label for="cnpj" class="form-label">CNPJ</label>
                          <input type="text" class="form-control" id="cnpj" name="cnpj">
                          <div id="ajuda" class="form-text">Informe o CNPJ da instituição</div>
                        </div>

                        <div class="mb-3">
                          <label for="inicio" class="form-label">Inicio em:</label>
                          <input type="text" class="form-control" id="inicio" name="data_fundacao">
                          <div id="ajuda" class="form-text">Informe a data da inicio da instituição.</div>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="" class="form-control" id="descricao" name="descricao">
                            <div id="ajuda" class="form-text">Informe a uma breve descrição sobre as atividades da instituição.</div>
                        </div>

                        <div class="mb-3">
                            <label for="reitor" class="form-label">Reitor:</label>
                            <input type="" class="form-control" id="reitor" name="responsavel">
                            <div id="ajuda" class="form-text">Informe o nome do responsavel pela instituição.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="" class="form-control" id="endereco" name="endereco">
                            <div id="ajuda" class="form-text">Informe o endereço da instituição.</div>
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