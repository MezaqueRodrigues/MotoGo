<?php

namespace App\Validation;

use App\Models\UsuarioModel;
use Exception;

class UserRules
{
	public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UsuarioModel();
            $user = $model->findUserByEmailAddress($data['email']);
            return password_verify($data['senha'], $user['senha']);
        } catch (Exception $e) {
            return false;
        }
    }
}
