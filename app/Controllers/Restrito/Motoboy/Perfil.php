<?php namespace App\Controllers\Restrito\Motoboy;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Libraries\Menu;

class Perfil extends BaseController
{
	public function index()
	{
		$session = session();
		$usuario = $session->get("usuario");
		
		



	    $crud = new GroceryCrud();
	    $crud->setTable('motoboy');
		$crud->setSubject("Motoboys");
		$crud->columns(["cpf", "telefone", "cidade"]);
		$crud->where("usuario_idusuario", $usuario["idusuario"] );
		$crud->fieldType("usuario_idusuario", "hidden", $usuario["idusuario"]);					
		

		if(isset($usuario["idpapel"])){
			$crud->unsetAdd();
		}
		$crud->setLangString('insert_success_message',
				'Por favor, faça o login novamente para entrar no sistema.
				<script type="text/javascript">
				window.location = "'.site_url("login/sair").'";
				</script>
				<div style="display:none">
				'
		);
		$crud->unsetDelete();
		$crud->unsetBackToDatagrid();
	    $output = $crud->render();
		$output->header_page = Menu::isCompleteProfile()? "Atualize seu perfil" : "Crie o seu perfil para prosseguir";	
		return  view('crud/index', (array)$output);
	}
}