<?php namespace App\Controllers\Restrito\Motoboy;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Libraries\Menu;
use App\Models\EncomendaModel;
use App\Models\EntregaModel;

class Encomendas extends BaseController
{
	public function disponiveis()
	{

	    $crud = new GroceryCrud();
	    $crud->setTable('encomendas');
		$crud->columns(["descricao_produto", "valor_entrega", "endereco_entrega", "status"]);
		$crud->unsetAdd();
		$crud->unsetEdit();
		$crud->unsetDelete();
		$crud->where("status", "SOLICITANDO ENTREGADORES");

		$crud->setActionButton('Fazer Entrega', 'fas fa-flag-checkered', function ($row) {
			return site_url("restrito/motoboy/encomendas/fazer_entrega/$row");
		}, true);

		$output = $crud->render();

		$output->header_page = "Encomendas disponíveis para entrega";	
		return  view('crud/index', (array)$output);
	}

	function fazer_entrega($id){
		$model = new EncomendaModel();
		$model->update($id, array("status"=>"ENTREGADOR A CAMINHO"));

		$usuario = Menu::getUser();

		$modelEntrega = new EntregaModel();
		$modelEntrega->save(array(
			'encomendas_idencomendas' => $id,
			'motoboy_id' => $usuario["idpapel"]
		));
		return redirect()->to(site_url("restrito/motoboy/entregas/minhas"));
	}

}