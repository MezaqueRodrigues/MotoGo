<?php

namespace App\Controllers\Api\Empresa;

use App\Controllers\Api\BaseApiResourceController;
use Config\Services;

class Encomenda extends BaseApiResourceController
{
	protected $modelName = 'App\Models\EncomendaModel';
	
	public function index()
	{
		$encomendas = $this->model
		       ->where("empresa_idempresa", $this->empresa["idempresa"])
			   ->findAll();
		return $this->respond($encomendas);
	}

	public function pendentes(){
		$encomendas = $this->model->findEncomendasPendentesEmpresa($this->empresa["idempresa"]);
		return $this->respond($encomendas);
	}

	public function finalizadas(){
		$encomendas = $this->model->findEncomendasFinalizadasEmpresa($this->empresa["idempresa"]);
		return $this->respond($encomendas);
	}
	
	public function show($id = null)
	{
		$encomendas = $this->model->find($id);
		if($encomendas){
			return $this->respond($encomendas);
		}
		return $this->fail("Essa encomenda não existe");
	}

	
	public function create()
	{
		$rules = array(
			'descricao_produto' => "required",
			'retirada_rua' => "required" ,
			'retirada_numero' => "required",
			'retirada_bairro'=> "required" ,
			'retirada_estado' => "required",
			'retirada_cidade' => "required",
			'retirada_cep' => "required",
			'entrega_rua' => "required",
			'entrega_numero' => "required",
			'entrega_bairro' => "required",
			'entrega_estado' => "required",
			'entrega_cidade' => "required",
			'entrega_cep' => "required",
			'peso' => "required",
			'dimensoes_produto' => "required",
			'valor_entrega' => "required",			
		);
		$validator = Services::validation();
		$validator->setRules($rules);
		$dados = $this->request->getJSON(true);
		$dados["status"] = "CRIADO";
		$dados["empresa_idempresa"] = $this->empresa["idempresa"];
		
		if($validator->run($dados)){
			$id = $this->model->insert($dados);
			$dados["idencomendas"] = $id;
			return $this->respondCreated(array(
				"encomenda" =>$dados,
				"status" => 201,
				"messages" =>"Encomenda criada com sucesso"
			));
		}else{
			return $this->fail($validator->getErrors());
		}
		
	}

	
	public function update($id = null)
	{
		//
	}

	public function delete($id = null)
	{
		$encomenda = $this->model->
			where("empresa_idempresa", $this->empresa["idempresa"])->find($id);
		if($encomenda){
			$this->model->delete($id);
			return $this->respond(array(
				"status" => 200,
				"message" => "Encomenda Apagada",
				"encomenda" => $encomenda
			));
		}else{
			return $this->failNotFound("Encomenda Inexistente");
		}
		
	}
}
