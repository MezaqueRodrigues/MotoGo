<?php namespace App\Controllers\Restrito\Motoboy;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Models\EncomendaModel;

class Entregas extends BaseController
{
	public function minhas()
	{
		$session = session();
		$usuario = $session->get("usuario");
	    $crud = new GroceryCrud();
	    $crud->setTable('entregas');
		$crud->columns(["created_at", "status"]);
		$crud->displayAs("created_at", "Hora do Aceite");
		$crud->unsetAdd();
		$crud->unsetDelete();
		$crud->unsetEdit();
		$crud->setActionButton('Ver Dados da Entrega', 'fas fa-search', function ($row) {
			return site_url("restrito/motoboy/entrega/ver/$row");
		}, true);

		$output = $crud->render();
		$output->header_page = "Minhas Entregas";	
		return  view('crud/index', (array)$output);
	}


}