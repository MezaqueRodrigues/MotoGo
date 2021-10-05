<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MotoboyModel extends Model
{
    protected $table = 'motoboy';
    protected $allowedFields = ['nome', 'cpf','cnh','rua','numero','bairro','cidade','estado','cep','data_nascimento', 'usuario_idusuario'];

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