<?php

namespace App\Controllers;

use App\Models\MotoboyModel;

class Motoboy extends BaseController
{
	public function index()
	{
		$modelo = new MotoboyModel();
		$dados["motoboys"] = $modelo->findAll();	
 		return view("motoboy/listagem", $dados);
	}

	public function cadastrar(){
		return view("motoboy/formulario");
	}

	public function salvar(){
		
		$nome =  $this->request->getPost('nome');
		$placa = $this->request->getPost("placa");

		$dados = array(
			"nome" => $nome,
			"placa" => $placa
		);

		$modelo = new MotoboyModel();
		$modelo->save($dados);

		return redirect()->to("motoboy");
	}
}
