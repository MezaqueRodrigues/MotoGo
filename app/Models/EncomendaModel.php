<?php

namespace App\Models;

use CodeIgniter\Model;

class EncomendaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'encomendas';
	protected $primaryKey           = 'idencomendas';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [ 
				'descricao_produto' ,
				'retirada_rua' ,
				'retira_numero' ,
				'retirada_bairro' ,
				'retirada_estado' ,
				'retirada_cidade' ,
				'retirada_cep' ,
				'entrega_rua' ,
				'entrega_numero' ,
				'entrega_bairro' ,
				'entrega_estado' ,
				'entrega_cidade' ,
				'entrega_cep' ,
				'peso',
				'dimensoes_produto' ,
				'valor_entrega' ,
				'status' ,
				'empresa_idempresa'
	 ];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	
}
