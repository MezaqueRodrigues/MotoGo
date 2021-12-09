<?php

namespace App\Controllers\Api;

use App\Models\EmpresaModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\MotoboyModel;
use CodeIgniter\HTTP\ResponseInterface;

class Empresa extends BaseApiResourceController
{
    use ResponseTrait;

	// pega todos os motoboys
    public function index()
    {        
        $model = new EmpresaModel();
        $data = $model->findAllEmpresaFeatures()->getResult();
        return $this->respond($data);      
    }

    // pega um único motoboy
    public function show($id = null)
    {
        $model = new EmpresaModel();
        $data = $model->find($id);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Não encontrado o Empresa com o ID= '.$id);
        }
    }

    public function getByUserId($id = null)
    {
        $model = new EmpresaModel();
        $data = $model->where(['usuario_idusuario' => $id])->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Não foi encontrado o Motoboy, cujo idUsuario é '.$id);
        }
    }
 
    // cria um novo motoboy no banco de dados
    public function create()
    {       
        $model = new EmpresaModel();
        $data = $this->request->getJSON(true);
        $data["usuario_idusuario"] = $this->user_request["idusuario"];
        $id = $model->insert($data, true);       
        if ($id) {
            $empresa = $model->find($id);
            return $this->respond([
                "message" => "Empresa inserida com sucesso",
                "status" => 201,
                "empresa" => $empresa 
            ]);
        }else{
            return $this->failValidationErrors($model->errors());
        }        
    }
 
    // Atualiza um motoboy
    public function update($id = null)
    {
        $model = new EmpresaModel();
        $data = $this->request->getJSON(true);

        $data["usuario_idusuario"] = $this->user_request["idusuario"];
        if($model->update($id, $data)==true){
            $empresa = $model->find($id);
			return $this->respond([
				"message" =>"Dados atualizados", 
			    "empresa" => $empresa
			]);
        }else{
            return $this->failValidationErrors($model->errors());
        }   
		
    }
 
    // Deleta um motoboy
    public function delete($id = null)
    {
        $model = new EmpresaModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);                         
            return $this->respondDeleted(["message"=>"empresa excluido"]);
        }else{
            return $this->failNotFound('Empresa não encontrado com o ID= '.$id);
        }                
    } 
}