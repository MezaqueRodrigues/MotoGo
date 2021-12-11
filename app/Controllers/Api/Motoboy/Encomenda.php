<?php

namespace App\Controllers\Api\Motoboy;

use App\Controllers\Api\BaseApiResourceController;
use App\Models\EntregaModel;
use Config\Services;

class Encomenda extends BaseApiResourceController
{
	protected $modelName = 'App\Models\EncomendaModel';
	
	public function novas(){
		$encomendas = $this->model->findNovasEncomendas();
		return $this->respond($encomendas);
	}

	public function minhas(){
		$encomendas = $this->model->findMotoboyEncomendas($this->motoboy["id"]);
		return $this->respond($encomendas);
	}
	
	public function candidatar($id = null){
		$encomenda = $this->model->where("status", "CRIADO")->find();
		if($encomenda){
			$modelEntrega = new EntregaModel();
			$dados = array(
				"status" => "AGUARDANDO RETIRADA",
				"encomendas_idencomendas" => $id,
				"motoboy_id" => $this->motoboy["id"]
			);
			$identrega = $modelEntrega->insert($dados);
			$dados["identregas"] = $identrega;
			$this->model->update($id, array("status" => "ENTREGADOR A CAMINHO"));
			return $this->respond(array(
				"status" => 201,
				"messages" => "Ok, vai buscar a encomenda",
				"encomenda" => $dados
			));
		}
		return $this->fail("Encomenda não está mais disponível");
	}

	public function confirmarEntrega($id = null){
		$modelEntrega = new EntregaModel();
		$entrega = $modelEntrega->find($id);
		if($entrega){
			$modelEntrega->update($id, array("hora_entrega" => date('Y-m-d H:i:s')));

			$this->model->update($entrega["encomendas_idencomendas"], array("status" => "ENTREGUE"));
			return $this->respond(array(
				"status" => 201,
				"messages" => "Obrigado por realizar essa entrega",
				"entrega" => $entrega
			));
		}
		 return $this->fail("Essa entrega não Existe!");
	
	}
	
}
