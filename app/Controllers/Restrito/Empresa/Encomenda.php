<?php namespace App\Controllers\Restrito\Empresa;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Models\EncomendaModel;

class Encomenda extends BaseController
{
	public function index()
	{
		$session = session();
		$usuario = $session->get("usuario");

	    $crud = new GroceryCrud();
	    $crud->setTable('encomendas');
		$crud->columns(["descricao_produto", "valor_entrega", "endereco_entrega", "status"]);
		//$crud->displayAs("descricao_produto", "Descrição do produto");
		//$crud->displayAs("endereco_retirada", "Endereço para retirada");
		//$crud->displayAs("endereco_entrega", "Endereço para entrega");
		//$crud->displayAs("dimensoes_produto", "Dimensões do produto");
		//$crud->fields(["descricao_produto","peso", "dimensoes_produto", "endereco_retirada", "endereco_entrega", "empresa_idempresa", "valor_entrega"]);
		$crud->fieldType("empresa_idempresa", "hidden", $usuario["idpapel"]);	
		$crud->where("empresa_idempresa", $usuario["idpapel"] );	
		$crud->fieldType("peso", "integer");
		$crud->fieldType("valor_entrega", "hidden");
		
		//melhorar calculo do frete
		$crud->callbackBeforeInsert(function ($stateParameters) {
			$stateParameters->data['valor_entrega'] = $stateParameters->data['peso'] + 5.0 ;		
			return $stateParameters;
		});

		$crud->setActionButton('Solicitar Entrega', 'fas fa-truck', function ($row) {
			return site_url("restrito/encomenda/solicitar_entrega/$row");
		}, true);

	    $output = $crud->render();
		$output->header_page = "Minhas solicitações de entrega";	
		return  view('crud/index', (array)$output);
	}

	function solicitar_entrega($id){
		$model = new EncomendaModel();
		$model->update($id, array("status"=>"SOLICITANDO ENTREGADORES"));
		return redirect()->back();
	}

	function encomendas_disponiveis(){
		$session = session();
		$usuario = $session->get("usuario");

	    $crud = new GroceryCrud();
	    $crud->setTable('encomendas');
		$crud->setSubject("Encomendas");
		$crud->columns(["descricao_produto", "valor_entrega", "endereco_entrega", "status"]);
		$output = $crud->render();
		$output->header_page = "Encomendas disponíveis para entrega";	
		return  view('crud/index', (array)$output);
	}
}