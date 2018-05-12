@extends('principal')

@section('script')

@stop

@section('conteudo')
<form class="form-act" method="POST" action="{{ action('PessoaController@salvar') }}">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <h2>Adicionar Pessoa</h2>
    <div class="form-group">
        <span class="nav-group-item">
            <h4>Nome</h4>
            <input type="text" class="form-control" placeholder=" Informe o Nome" name="nome">
            <h4>Senha</h4>
            <input type="password" class="form-control" placeholder=" Informe a chave de segurança" name="senha">
        </span>
    </div>            
    <div class="form-action confirm">
        <a id="cancelar" class="btn btn-negative" href="{{ action('PessoaController@listar') }}">
            Cancelar</a>
        <button type="submit" id="efetivar" class="btn btn-primary">Adicionar Pessoa</button>
    </div>
</form>
@stop
