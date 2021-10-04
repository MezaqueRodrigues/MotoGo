<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Empresa extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('empresa');
		$crud->setSubject("Empresa");
		$crud->setRelation("usuario_idusuario", "usuario", "email");
	    $output = $crud->render();
		$output->header_page = "Cadastros - Empresas";	
		return  view('crud/index', (array)$output);
	}

}