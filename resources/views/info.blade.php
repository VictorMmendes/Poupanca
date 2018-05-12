@extends('principal')

@section('script')
<script type="text/javascript">
    $(document).ready(function()
    {

        $("#sacar").focus(function()
        {
            var checkVisible = document.getElementById('warning').offsetHeight

            if(checkVisible != 0)
            {
                document.getElementById('warning').style.visibility = "hidden";
                document.getElementById('sacar').style.borderColor = "#c0c0c0";
            }
        });

        if($('#senhaIncorreta').val() == 1)
        {
            document.getElementById('verificaSenha').style.color = "red";
            document.getElementById('confirmarSenha').style.display = "block";
            document.getElementById('verificaSenha').style.visibility = "visible";
            document.getElementById('confirmOperacao').style.color = "red";
            document.getElementById('senha').style.borderColor = "red";
            document.getElementById('saldoParticular').value = <?= $saldo ?>;
            document.getElementById('efetivar').disabled = false;
        } else {
            document.getElementById('efetivar').disabled = true;
        }

        $("#senha").focus(function()
        {
            document.getElementById('confirmOperacao').style.color = "#333";
            document.getElementById('senha').style.borderColor = "#ddd";
            document.getElementById('verificaSenha').style.visibility = "hidden";
        });

        $("#efetivar").mouseover(function()
        {
            document.getElementById('confirmarSenha').style.display = "block";
        });

        $(".acoes").mouseover(function()
        {
            if($('#senhaIncorreta').val() != 1)
            {
                document.getElementById('confirmarSenha').style.display = "none";
            }
        });
    });

    function updateSaldo(tipo)
    {
        var saldo = parseFloat(document.getElementById('saldoParticular').value);
        if(tipo == 1)
        {
            var deposito = parseFloat(document.getElementById('depositar').value);
            if(deposito > 0)
            {
                document.getElementById('depositar').value = "";
                saldo += deposito;
                document.getElementById('efetivar').disabled = false;
            }
        } else {
            var sacar = parseFloat(document.getElementById('sacar').value);
            if(sacar > 0)
            {
                if(saldo-sacar >= 0)
                {
                    saldo -= sacar;
                    document.getElementById('sacar').value = "";
                    document.getElementById('efetivar').disabled = false;
                } else {
                    document.getElementById('sacar').style.borderColor = "red";
                    document.getElementById('warning').style.visibility = "visible";
                }
            }
        }

        if(isNaN(saldo) == false)
        {
            document.getElementById('saldoParticular').value = saldo;
            if(<?= ($pessoa->saldo) ?> == saldo)
            {
                document.getElementById('efetivar').disabled = true;
            }
        }
    }
</script>
@stop

@section('conteudo')
<form class="form-act" method="POST" action="{{ action('PessoaController@atualizarSaldo', $pessoa->id) }}">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" id="senhaIncorreta" value="{{ $senhaIncorreta }}">
    <h2>Poupança Particular</h2>
    <h3 class="pessoaNome">{{ $pessoa->nome }}</h3>
    <h4 class="pessoaSaldo">Saldo: R$<input type="text" value="{{ round($pessoa->saldo, 2) }}" id="saldoParticular" name="saldo" readonly></h4>
    <div class="form-group acoes">
        <span class="nav-group-item">
            <h4>Depositar</h4>
            <input type="number" placeholder="Informe o valor" class="form-control" id="depositar">
            <span class="btn btn-positive actions" onclick="updateSaldo(1)">Depositar</span>
        </span>
    </div>
    <div class="form-group acoes">
        <span class="nav-group-item">
            <h4>Sacar</h4>
            <input type="number" placeholder="Informe o valor" class="form-control" id="sacar">
            <span class="btn btn-positive actions" onclick="updateSaldo(2)">Sacar</span>
            <p id="warning">Saldo insuficiente para saque, operação não realizada<p>
        </span>
    </div>
    <div class="form-group" id="confirmarSenha">
        <span class="nav-group-item">
            <h4 id="confirmOperacao">Confirme a senha</h4>
            <input type="password" placeholder="Digite a senha para confirmar operação" class="form-control" name="senha" id="senha">
            <p id="verificaSenha">Senha incorreta</p>
        </span>
    </div>
    <div class="form-action confirm">
        <a id="cancelar" class="btn btn-negative" href="{{ action('PessoaController@listar') }}">
            Cancelar</a>
        <button type="submit" id="efetivar" class="btn btn-primary">Confirmar Transações</button>
    </div>
</form>
@stop
