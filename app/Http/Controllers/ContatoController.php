<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContatoEnviarRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contato;

class ContatoController extends Controller
{
    	/**
     * Exibe o formulário para enviar uma mensagem
     */
    public function index(){
    	return view('welcome');
    }

	/**
     * Insere a mensagem no banco de dados
     */
    public function enviar(ContatoEnviarRequest $request, Contato $contato, \App\NotificacaoInterface $notificar){
		$contato = new Contato();

		$contato->nome = $request->get('nome');
		$contato->email = $request->get('email');
        $contato->mensagem = $request->get('mensagem');
        $contato->categoria_id = $request->get('categoria_id');

		$contato->save();
        $notificar->notificar();
		echo "Sua mensagem foi armazenada com sucesso! Código: " . $contato->id;
    }

	/**
     * Exibe uma lista com as mensagens cadastradas
     */
    public function lista(){
    	return view('lista', array('contatos' => Contato::all()));
    }
}
