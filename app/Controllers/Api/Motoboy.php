<?php namespace App\Controllers\Api;
 
use CodeIgniter\API\ResponseTrait;
use App\Models\MotoboyModel;
use CodeIgniter\HTTP\ResponseInterface;

class Motoboy extends BaseApiResourceController
{
    use ResponseTrait;

	// pega todos os motoboys
    public function index()
    {        
        $model = new MotoboyModel();
        $data = $model->findAllMotoboyFeatures()->getResult();
        return $this->respond($data);      
    }

    // pega um único motoboy
    public function show($id = null)
    {
        $model = new MotoboyModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Não encontrado o motoboy com o ID= '.$id);
        }
    }
 
    // cria um novo motoboy no banco de dados
    public function create()
    {       
        $model = new MotoboyModel();
        $data = $this->getRequestInput();
        $data["usuario_idusuario"] = $this->user_request["idusuario"];
                
        if ($model->insert($data)==true) {
            return $this->respond(["message" => "Motoboy inserido com sucesso"]);
        }else{
            return $this->failValidationErrors($model->errors());
        }        
    }
 
    // Atualiza um motoboy
    public function update($id = null)
    {
        $model = new MotoboyModel();
        $data = $this->getRequestInput();
        $data["usuario_idusuario"] = $this->user_request["idusuario"];
        if($model->update($id, $data)==true){
            return $this->respond(["message"=>"Dados atualizados"]);
        }else{
            return $this->failValidationErrors($model->errors());
        }    
    }
 
    // Deleta um motoboy
    public function delete($id = null)
    {
        $model = new MotoboyModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);                         
            return $this->respondDeleted(["message"=>"motoboy excluido"]);
        }else{
            return $this->failNotFound('Motoboy não encontrado com o ID= '.$id);
        }                
    } 
}