<?php namespace App\Controllers;

use App\Controllers\Api\Motoboy;
use App\Models\EmpresaModel;
use App\Models\MotoboyModel;
use App\Models\UsuarioModel;

class Login extends BaseController
{
	
	public function site()
	{
		return view("login/login");
	}

	public function cadastrar(){

		$rules = [
            'nome' => 'required|min_length[5]',
            'tipo' => 'required',
            "foto" => [
                "rules" => "uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]",
                "label" => "Foto Perfil",
              ],
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[usuario.email]',
            'senha' => 'required|min_length[8]|max_length[255]'
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules)) {
            $dados["erros_cad"] = $this->validator->getErrors();
			return view("login/login", $dados);
        }

        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $name = $file->getRandomName();
            $file->move("photos", $name);
            $input["foto"] = "photos/$name";
        }
        
       $userModel = new UsuarioModel();
       $userModel->save($input);
       $usuario = $userModel->where("email", $input["email"])->first();
       unset($usuario["senha"]);
     
       $session = session();
	   $session->set("usuario", $usuario);
       return redirect()->to(site_url("restrito/main"));
	}

	public function entrar(){
		$rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'senha' => 'required|min_length[8]|max_length[255]'
        ];

       if(!$this->validate($rules)){
            $dados["erros"] = $this->validator->getErrors();
            return view("login/login", $dados);
       }

        $model = new UsuarioModel();
        $usuario = $model->where("email", $this->request->getPost("email"))->first();

        if((!isset($usuario["senha"])) || (!password_verify($this->request->getPost("senha"), $usuario["senha"]))){
            $dados["erros"] = array("senha inválida");
            return view("login/login", $dados);
        }

		$session = session();
        unset($usuario["senha"]);

        if($usuario["tipo"] == "Empresa"){
            $empresaModel = new EmpresaModel();
            $empresa = $empresaModel->where("usuario_idusuario", $usuario["idusuario"])->first();
            $usuario["idpapel"] = $empresa["idempresa"];
        }else if($usuario["tipo"] == "Motoboy"){
            $motoboyModel = new MotoboyModel();
            $motoboy = $motoboyModel->where("usuario_idusuario", $usuario["idusuario"])->first();
            if(isset($motoboy["id"])){
                $usuario["idpapel"] = $motoboy["id"];
            }            
        }

		$session->set("usuario", $usuario);
		return redirect()->to(site_url("restrito/main"));
	}

	public function sair(){
		$session = session();
		$session->remove('usuario');
		return redirect()->to(site_url("login"));
	}
}