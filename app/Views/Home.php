<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('pagina_inicial');
	}

	public function cadastrar(){
		echo "Estou executando a função cadastrar do controlador home";
	}
}
