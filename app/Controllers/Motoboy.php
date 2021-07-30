<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Motoboy extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('motoboy');
		$crud->setSubject("Motoboys");
		$crud->columns(["nome", "cpf", "telefone"]);
	    $output = $crud->render();
		$output->header_page = "Cadastros - Motoboy";	
		return  view('crud/index', (array)$output);
	}
}