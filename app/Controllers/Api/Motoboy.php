<?php namespace App\Controllers\Api;
 
use CodeIgniter\API\ResponseTrait;
use App\Models\MotoboyModel;
use CodeIgniter\HTTP\ResponseInterface;

class Motoboy extends BaseApiResourceController
{
    use ResponseTrait;

    public function salvarfoto(){
        $foto = file_get_contents("php://input");
        file_put_contents("photos/umafoto.jpg", $foto);
        return $this->respond(array("foto"=>"ok"), 200);
    }
    
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

    public function getByUserId($id = null)
    {
        $model = new MotoboyModel();
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
        $model = new MotoboyModel();
        $data = $this->request->getJSON(true);
        $data["usuario_idusuario"] = $this->user_request["idusuario"];
        $id = $model->insert($data, true);       
        if ($id) {
            $motoboy = $model->find($id);
            return $this->respond([
                "message" => "Motoboy inserido com sucesso",
                "status" => 201,
                "motoboy" => $motoboy 
            ]);
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