<?php namespace App\Controllers\Api;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MotoboyModel;
 
class Motoboy extends ResourceController
{
    use ResponseTrait;
    
	// pega todos os motoboys
    public function index()
    {
        $model = new MotoboyModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
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
        $data = [
            'nome' => $this->request->getPost('nome'), 
			'cpf'=> $this->request->getPost('cpf'),
			'cnh'=> $this->request->getPost('cnh'),
			'rua'=> $this->request->getPost('rua'),
			'numero'=> $this->request->getPost('numero'),
			'bairro'=> $this->request->getPost('bairro'),
			'cidade'=> $this->request->getPost('cidade'),
			'estado'=> $this->request->getPost('estado'),
			'cep'=> $this->request->getPost('cep'),
			'data_nascimento'=> $this->request->getPost('data_nascimento'), 
			'usuario_idusuario' => 2
        ];

		if(!$this->request->getPost()){
			$data = json_decode(file_get_contents("php://input"));
		}        
         
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Dados Salvos'
            ]
        ];
         
        return $this->respondCreated($data, 201);
    }
 
    // Atualiza um motoboy
    public function update($id = null)
    {
        $model = new MotoboyModel();
        $json = $this->request->getJSON();
        if($json){
            $data = [
				'nome'=> $json->nome, 
				'cpf'=> $json->cpf,
				'cnh'=> $json->cnh,
				'rua'=> $json->rua,
				'numero'=> $json->numero,
				'bairro'=> $json->bairro,
				'cidade'=> $json->cidade,
				'estado'=> $json->estado,
				'cep'=> $json->cep,
				'data_nascimento'=> $json->data_nascimento, 
				'usuario_idusuario'=> 1,
            ];
        }else{
            $input = $this->request->getRawInput();
			$data = [
				'nome'=> $input['nome'], 
				'cpf'=> $input['cpf'],
				'cnh'=> $input['cnh'],
				'rua'=> $input['rua'],
				'numero'=> $input['numero'],
				'bairro'=> $input['bairro'],
				'cidade'=> $input['cidade'],
				'estado'=> $input['estado'],
				'cep'=> $input['cep'],
				'data_nascimento'=> $input['data_nascimento'], 
				'usuario_idusuario'=> 1,
            ];
        }
        // Atualiza no banco de dados
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Dados Atualizados'
            ]
        ];

        return $this->respond($response);

    }
 
    // Deleta um motoboy
    public function delete($id = null)
    {
        $model = new MotoboyModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Motoboy Excluido'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Motoboy não encontrado com o ID= '.$id);
        }
         
    }
 
}