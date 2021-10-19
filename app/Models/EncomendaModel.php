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
	protected $allowedFields        = [ 'idencomendas', 'descricao_produto', 'endereco_retirada', 'endereco_entrega', 'peso', 'dimensoes_produto', 'valor_entrega', 'status', 'empresa_idempresa', ];

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
