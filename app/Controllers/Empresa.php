<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Empresa extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('empresa');
	    $output = $crud->render();
		return  view('template/admin/admin_lte', (array)$output);
	}

}