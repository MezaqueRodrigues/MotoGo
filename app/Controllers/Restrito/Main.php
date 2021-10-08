<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\ViewCreator;
use App\Models\MotoboyModel;

class Main extends BaseController
{
	public function site(){		
		$data = array("header_page"=> "Painel de Controle");
		return  view('main/index', $data);	
	}

	public function tabela(){

		$userModel = new MotoboyModel();
		$usuario = $userModel->findAll();
		
		$tabela = new ViewCreator();
		$tabela->setSubject("Motoboy");
		$tabela->setPrimaryKey("id");
		$tabela->setControllerURL("restrito/motoboy/perfil/index");
		$tabela->crudActions("CRUD");

		$tabela->addAction("Alterar Senha", "fas fa-user", "restrito/usuario/index", function($id){
			if ($id!=22){
				return true;
			}
			return false;
		});

		$tabela->setColumns(["rua"=>"Rua", "cnh"=>"CNH", "cidade"=>"Cidade"]);
		$tabela->setData($usuario);

		$out = $tabela->render();
		$data = array(
			"header_page"=> "Painel de Controle", 
			"output"=>$out);
		return  view('main/teste', $data);	
	}
}