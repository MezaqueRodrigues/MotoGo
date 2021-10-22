<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;

class Auth extends BaseController
{
    /**
     * Register a new user
     * @return Response
     * @throws ReflectionException
     */
    public function register()
    {
        $rules = [
            'nome' => 'required|min_length[5]',
            'tipo' => 'required',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[usuario.email]',
            'senha' => 'required|min_length[8]|max_length[255]',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules)) {
            return $this->getResponse(
                $this->validator->getErrors(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }

        //faz o upload
        $file = $this->request->getFile('foto');
        $profile_image = $file->getName();

        // Renomeia o arquivo
        $temp = explode(".", $profile_image);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if ($file->move("photos/", $newfilename)) {
            $input["foto"] = "photos/" . $newfilename;
            $userModel = new UsuarioModel();
            $userModel->save($input);
            return $this->getJWTForUser(
                $input['email'],
                ResponseInterface::HTTP_CREATED
            );
        } else {
            return $this->getResponse(
                ["erro" => "ocorreu um erro inesperado ao salvar a foto"],
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Authenticate Existing User
     * @return Response
     */
    public function login()
    {
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'senha' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'senha' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules, $errors)) {
            return $this->getResponse(
                $this->validator->getErrors(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
        return $this->getJWTForUser($input['email']);
    }

    private function getJWTForUser(string $emailAddress, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {
            $model = new UsuarioModel();
            $user = $model->findUserByEmailAddress($emailAddress);
            unset($user['senha']);

            helper('jwt');
            $user["foto"] = base_url($user["foto"]);
            return $this
                ->getResponse(
                    [
                        'message' => 'Usuario autenticado com sucesso',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ]
                );
        } catch (Exception $exception) {
            return $this->getResponse(['error' => $exception->getMessage()], $responseCode);
        }
    }
}
