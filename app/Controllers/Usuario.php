<?php namespace App\Controllers;

class Usuario extends BaseController
{
	
	public function site()
	{
		return view("login/login");
	}

	public function cadastrar(){
		echo "entrando";
	}

	public function entrar(){
		$email = $this->request->getPost("email");
		$senha = $this->request->getPost("senha");
		var_dump([$email, $senha]);
	}

	public function sair(){
		echo "saindo";
	}
}