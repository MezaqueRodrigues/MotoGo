<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Libraries\Menu;

class Motoboy extends BaseController
{
	public function index()
	{
		$session = session();
		$usuario = $session->get("usuario");
		
	    $crud = new GroceryCrud();
	    $crud->setTable('motoboy');
		$crud->setSubject("Motoboys");
		$crud->columns(["usuario_idusuario", "cpf", "email", "telefone"]);
		
		if($usuario["tipo"]=="Motoboy" && $crud->getState() != 'list'){
			$crud->fieldType("usuario_idusuario", "hidden", $usuario["idusuario"]);
		}else{
			$crud->setRelation("usuario_idusuario", "usuario", "nome");
		    $crud->displayAs("usuario_idusuario", "Nome");
		}
	    $output = $crud->render();
		$output->header_page = Menu::isCompleteProfile()? "Cadastros - Motoboy" : "Complete seu perfil para prosseguir";	
		return  view('crud/index', (array)$output);
	}
}