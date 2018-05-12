<?php

namespace App\Http\Controllers;

use Request;
use App\PessoaModel;
use App\DepositoModel;
use App\SaqueModel;

class PessoaController extends Controller {

    public function listar()
    {
        $pessoas = PessoaModel::all();
        $media = 0;
        $total = 0;
        $quantidade = 0;
        foreach ($pessoas as $pessoa)
        {
            if($pessoa->saldo > $media)
            {
                $media = $pessoa->saldo;
            }
            $total += $pessoa->saldo;
            $quantidade++;
        }

        foreach ($pessoas as $pessoa)
        {
            if($pessoa->saldo < $media-100) $quantidade--;
        }
        if($quantidade == 0) $quantidade = 1;
        return view('main')->with('pessoas', $pessoas)->with('total', $total)->with('media', $media)->with('quantidade', $quantidade);
    }

    public function info($id)
    {
        $pessoa = PessoaModel::find($id);
        if(empty($pessoa))
        {
            return redirect()->action('PessoaController@listar')->withInput();
        } else {
            $senhaIncorreta = 0;
            $saldo = 0;
            return view('info')->with('pessoa', $pessoa)->with('senhaIncorreta', $senhaIncorreta)->with('saldo', $saldo);;
        }
    }

    public function atualizarSaldo($id)
    {
        $pessoa = PessoaModel::find($id);
        $senha = Request::input('senha');
        if($senha != $pessoa->senha)
        {
            $senhaIncorreta = 1;
            $saldo = Request::input('saldo');
            return view('info')->with('pessoa', $pessoa)->with('senhaIncorreta', $senhaIncorreta)->with('saldo', $saldo);
        } else {
            $saldo = Request::input('saldo');
            if($saldo > $pessoa->saldo)
            {
                $deposito = new DepositoModel();
                $deposito->id_pessoa_models = $pessoa->id;
                $deposito->valor = ($saldo - $pessoa->saldo);
                $deposito->data = date("Y-m-d");
                $deposito->save();
            } else {
                $saque = new SaqueModel();
                $saque->id_pessoa_models = $pessoa->id;
                $saque->valor = ($pessoa->saldo - $saldo);
                $saque->save();
            }
        }

        return redirect()->action('PessoaController@listar')->withInput();
    }

    public function adicionar()
    {
        return view('adicionar');
    }

    public function salvar()
    {
        $pessoa = new PessoaModel();
        $pessoa->nome = Request::input('nome');
        $pessoa->senha = Request::input('senha');
        $pessoa->saldo = 0;
        $pessoa->save();
        return redirect()->action('PessoaController@listar')->withInput();
    }
}
