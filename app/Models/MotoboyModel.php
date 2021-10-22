<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MotoboyModel extends Model
{
    protected $table = 'motoboy';
    protected $allowedFields = ['telefone','cpf','cnh','rua','numero','bairro','cidade','estado','cep','data_nascimento', 'usuario_idusuario'];

    protected $validationRules    = [
        'telefone'     => 'required',
        'cpf'        => 'required|is_unique[motoboy.cpf,usuario_idusuario,{usuario_idusuario}]',
        'cnh'     => 'required|is_unique[motoboy.cnh,usuario_idusuario,{usuario_idusuario}]',
        'rua'     => 'required|alpha_numeric_space|min_length[8]',
        'numero'     => 'required',
        'bairro'     => 'required',
        'cidade'     => 'required',
        'estado'     => 'required',
        'cep'     => 'required',
        'data_nascimento'     => 'required|valid_date',                
    ];

    public function findAllMotoboyFeatures(){
        $builder = $this->db->table('motoboy');
        $builder->select('usuario.idusuario, motoboy.id as idmotoboy, usuario.nome, usuario.foto, 
         motoboy.telefone, motoboy.cpf, motoboy.cnh, motoboy.rua,
        motoboy.numero, motoboy.bairro, motoboy.cidade, motoboy.estado, motoboy.cep, motoboy.data_nascimento');
        $builder->join('usuario', 'usuario.idusuario = motoboy.usuario_idusuario');
        $query = $builder->get();
        return $query;
    }

    public function findMotoboyById($id)
    {
        $client = $this
            ->asArray()
            ->where(['id' => $id])
            ->first();

        if (!$client) throw new Exception('Não foi encontrado o motoboy com esse id');

        return $client;
    }
}