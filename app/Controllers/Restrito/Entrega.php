<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Entrega extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('entregas');
		$crud->setSubject("Entregas");		
	    $output = $crud->render();
		$output->header_page = "Cadastros - Entregas";	
		return  view('crud/index', (array)$output);
	}
}