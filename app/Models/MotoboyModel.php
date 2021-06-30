<?php

namespace App\Models;

use CodeIgniter\Model;

class MotoboyModel extends Model
{
    protected $table = 'motoboy';
    protected $allowedFields = ['nome', 'placa'];
}