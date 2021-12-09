<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Encomenda extends BaseApiResourceController
{
	protected $modelName = 'App\Models\EncomendaModel';
	
	public function index()
	{
		$encomendas = $this->model->where("idempresa", "")->findAll();
		return $this->respond($encomendas);
	}
	
	public function show($id = null)
	{
		//
	}

	
	public function create()
	{
		//
	}

	
	public function update($id = null)
	{
		//
	}

	
	public function delete($id = null)
	{
		//
	}
}
