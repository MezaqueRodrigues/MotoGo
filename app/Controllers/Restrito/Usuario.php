<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Usuario extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('usuario');
		$crud->setSubject("usuario");
		$crud->columns(["email", "tipo"]);
	    $output = $crud->render();
		$output->header_page = "Cadastros - Usuários";	
		return  view('crud/index', (array)$output);
	}
}