<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class EmpresaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'empresa';
	protected $primaryKey           = 'idempresa';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [ 'cnpj','rua', 'numero', 'cidade', 'estado', 'bairro', 'cep', 'telefone', 'usuario_idusuario' ];

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

	public function findAllEmpresaFeatures(){
        $builder = $this->db->table('empresa');
        $builder->select('usuario.idusuario, empresa.idempresa, usuario.nome, usuario.foto, 
         empresa.telefone, empresa.cnpj, empresa.rua,
        empresa.numero, empresa.bairro, empresa.cidade, empresa.estado, empresa.cep');
        $builder->join('usuario', 'usuario.idusuario = empresa.usuario_idusuario');
        $query = $builder->get();
        return $query;
    }

	public function findEmpresaByUser($id){
		return $this->where("usuario_idusuario", $id)->first();
	}
    public function findEmpresaById($id)
    {
        $client = $this
            ->asArray()
            ->where(['idempresa' => $id])
            ->first();

        if (!$client) throw new Exception('Não foi encontrado o empresa com esse id');

        return $client;
    }
}
