<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Motoboy extends BaseController
{
	public function index()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('motoboy');
	    $output = $crud->render();
		return  view('template/admin/admin_lte', (array)$output);
	}
}