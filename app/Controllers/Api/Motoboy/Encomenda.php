<?php

namespace App\Controllers\Api\Motoboy;

use App\Controllers\Api\BaseApiResourceController;
use Config\Services;

class Encomenda extends BaseApiResourceController
{
	protected $modelName = 'App\Models\EncomendaModel';
	
	public function novas(){
		$encomendas = $this->model->where("status", "CRIADO")->findAll();
		return $this->respond($encomendas);
	}

	public function candidatar($id = null){
		$encomenda = $this->model->find($id);
		return $this->respond($encomenda);
	}
	
	
}
