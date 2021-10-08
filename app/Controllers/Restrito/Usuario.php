<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Usuario extends BaseController
{
	public function index()
	{
		$session = session();
		$usuario = $session->get("usuario");

	    $crud = new GroceryCrud();
	    $crud->setTable('usuario');
		$crud->setSubject("Usuário");
		$crud->columns(["email", "tipo"]);

		if($usuario["tipo"] !="Administrador"){
			$crud->where("idusuario", $usuario["idusuario"] );
			$crud->unsetDelete();
			$crud->unsetAdd();
			$crud->unsetEdit();
		}

	    $output = $crud->render();
		$output->header_page = "Cadastros - Usuários";	
		return  view('crud/index', (array)$output);
	}
}