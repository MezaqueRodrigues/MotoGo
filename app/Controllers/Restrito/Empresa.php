<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Empresa extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('empresa');
		$crud->setSubject("Empresa");
		$crud->columns(["nome", "email", "cnpj", "telefone"]);
		$crud->setRelation("usuario_idusuario", "usuario", "email");
	    $output = $crud->render();
		$output->header_page = "Cadastros - Empresas";	
		return  view('crud/index', (array)$output);
	}

}