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
		$crud->unsetDelete();
		$crud->unsetAdd();
		$crud->unsetBackToDatagrid();
	    $output = $crud->render();
		$output->header_page = Menu::isCompleteProfile()? "Cadastros - Motoboy" : "Complete seu perfil para prosseguir";	
		return  view('crud/index', (array)$output);
	}
}