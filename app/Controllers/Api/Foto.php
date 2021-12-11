<?php

namespace App\Controllers\Api;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class Foto extends BaseApiResourceController
{
	public function create()
	{
		$idusuario =  $this->user_request["idusuario"];
		$usuarioModel = new UsuarioModel();
		helper('text');
		$nome = random_string('alnum', 24) . ".jpg";
		$usuarioModel->update($idusuario, array("foto"=>"photos/$nome"));
		$foto = file_get_contents("php://input");
        file_put_contents("photos/$nome", $foto);
        return $this->respond(array(
			"foto"=>base_url("photos/$nome"),
			"status"=>200,
			"message"=>"Upload Realizado com sucesso"
		), 200);
	}
}
