<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Psr\Log\LoggerInterface;


class BaseApiResourceController extends ResourceController
{
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
        helper('jwt');
        $this->user_request = getUserRequest($request);       
		
    }

	public function getResponse(array $responseBody,  int $code = ResponseInterface::HTTP_OK)
	{
		return $this->response
			->setStatusCode($code)
			->setJSON($responseBody);
	}

	public function getRequestInput(){
		//dados enviados via Post
		$input = $this->request->getPost();
		
		//se não tem dados via POST tenta via PUT
		if (empty($input)) {
			$input = $this->request->getRawInput();
		}
		//Se não tem dados via put tenta via JSON
		if (empty($input)) {
			$input = json_decode($this->request->getBody(), true);
		}
		
		return $input;
	}
}
