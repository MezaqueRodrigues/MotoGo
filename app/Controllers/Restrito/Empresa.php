<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Libraries\Menu;

class Empresa extends BaseController
{
	public function index()	
	{
		$session = session();
		$usuario = $session->get("usuario");

	    $crud = new GroceryCrud();
	    $crud->setTable('empresa');
		$crud->setSubject("Empresa");
		$crud->columns(["usuario_idusuario", "cnpj", "email", "telefone"]);
		
		if($usuario["tipo"]=="Empresa" && $crud->getState() != 'list'){
			$crud->fieldType("usuario_idusuario", "hidden", $usuario["idusuario"]);
		}else{
			$crud->setRelation("usuario_idusuario", "usuario", "nome");
		    $crud->displayAs("usuario_idusuario", "Razão Social");
		}
	    $output = $crud->render();
		$output->header_page = Menu::isCompleteProfile()? "Cadastros - Empresas" : "Complete seu perfil para prosseguir";	
		return  view('crud/index', (array)$output);
	}

}