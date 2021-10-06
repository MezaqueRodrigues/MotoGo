<?php

namespace App\Filters;

use App\Controllers\Restrito\Usuario;
use App\Libraries\Menu;
use App\Models\EmpresaModel;
use App\Models\MotoboyModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CompleteProfileFilter implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null       $arguments
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		$uri = (string) current_url(true);
		#log_message('error', $uri);
		
		$usuario = Menu::getUser();

		$urlMotoboys = array(
			site_url("restrito/motoboy/index/add"),
			site_url("restrito/motoboy/index/insert"),
			site_url("restrito/motoboy/index/insert_validation")			
		);

		$urlEmpresa = array(
			site_url("restrito/empresa/index/add"),
			site_url("restrito/empresa/index/insert"),
			site_url("restrito/empresa/index/insert_validation")			
		);
		
		if($usuario["tipo"]=="Motoboy" && !in_array($uri, $urlMotoboys)){
			$model = new MotoboyModel();
			$motoboy = $model->where("usuario_idusuario", $usuario["idusuario"])->first();
			if(!$motoboy){
				return redirect()->to(site_url("restrito/motoboy/index/add"));
			}
		}else if($usuario["tipo"]=="Empresa" && !in_array($uri, $urlEmpresa)){
			$model = new EmpresaModel();
			$empresa = $model->where("usuario_idusuario", $usuario["idusuario"])->first();
			if(!$empresa){
				return redirect()->to(site_url("restrito/empresa/index/add"));
			}
		}	
							
	}

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null        $arguments
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
