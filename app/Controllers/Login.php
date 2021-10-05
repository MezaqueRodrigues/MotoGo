<?php namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
	
	public function site()
	{
		return view("login/login");
	}

	public function cadastrar(){
		$rules = [
            'tipo' => 'required',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[usuario.email]',
            'senha' => 'required|min_length[8]|max_length[255]'
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules)) {
            $dados["erros_cad"] = $this->validator->getErrors();
			return view("login/login", $dados);
        }

       $userModel = new UsuarioModel();
       $userModel->save($input);
     
       return redirect()->to(site_url("home/restrito"));
	}

	public function entrar(){
		
		$rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'senha' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'senha' => [
                'validateUser' => 'Usuário ou senha inválidos'
            ]
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules, $errors)) {
			$dados["erros"] = $this->validator->getErrors();
			return view("login/login", $dados);
        }
		
		$session = session();
		$session->set("usuario", array("email"=> $input["email"]));
		return redirect()->to(site_url("home/restrito"));
	}

	public function sair(){
		$session = session();
		$session->remove('usuario');
		return redirect()->to(site_url("login"));
	}
}