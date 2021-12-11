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

	public function findNovasEncomendas(){
		$encomendas =  $this->where("status", "CRIADO")->findAll();
		$dados = [];
		foreach($encomendas as $encomenda){
			$empresaModel = new \App\Models\EmpresaModel();
			$empresa = $empresaModel->find($encomenda["empresa_idempresa"]);
			$encomenda["empresa"] = $empresa;

			$usuarioModel = new \App\Models\UsuarioModel();
			$encomenda["usuario"] = $usuarioModel->getUsuario($empresa["usuario_idusuario"]);
			$dados[] = $encomenda;
		}
		return $dados;
	}

	public function findMotoboyEncomendas($idmotoboy){
		$modelEntrega = new \App\Models\EntregaModel();
		$entregas = $modelEntrega
					->where("motoboy_id", $idmotoboy)
					->where("hora_entrega", NULL)->findAll();
		$resultado = [];
		foreach($entregas as $entrega){			
			$encomenda = $this->findEncomendaWithEmpresa($entrega["encomendas_idencomendas"]);
			$encomenda["entrega"] = $entrega;

			$usuarioModel = new \App\Models\UsuarioModel();
			$encomenda["usuario"] = $usuarioModel->getUsuario($encomenda["empresa"]["usuario_idusuario"]);

			$resultado[] = $encomenda;
		}		
		return $resultado;
	}

	public function findEncomendaWithEmpresa($idEncomenda){
		$encomenda = $this->find($idEncomenda);
		$modelEmpresa = new \App\Models\EmpresaModel();
		$encomenda["empresa"] = $modelEmpresa->find($encomenda["empresa_idempresa"]);
		return $encomenda;
	}

	public function findEncomendasPendentesEmpresa($idempresa){
		$builder = $this->db->table('encomendas');
		$builder->select("encomendas.*, entregas.hora_entrega");
        $builder->join("entregas", "encomendas.idencomendas = entregas.encomendas_idencomendas", "left");
		$builder->where("entregas.hora_entrega", null);
		$builder->where("encomendas.empresa_idempresa", $idempresa);
        $query = $builder->get()->getResult();
        return $query;
	}

	public function findEncomendasFinalizadasEmpresa($idempresa){
		$builder = $this->db->table('encomendas');
		$builder->select("encomendas.*, entregas.hora_entrega");
        $builder->join("entregas", "encomendas.idencomendas = entregas.encomendas_idencomendas", "left");
		$builder->where("entregas.hora_entrega IS NOT NULL", null);
		$builder->where("encomendas.empresa_idempresa", $idempresa);
        $query = $builder->get()->getResult();
        return $query;
	}
}
