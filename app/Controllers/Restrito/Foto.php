<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Libraries\Menu;

class Foto extends BaseController
{
	public function alterar()	
	{
		$session = session();
		$usuario = $session->get("usuario");

	    $crud = new GroceryCrud();
	    $crud->setTable('usuario');
		$crud->setSubject("usuario");
				
		$crud->fieldType("usuario_idusuario", "hidden", $usuario["idusuario"]);	
		$crud->fieldType("foto", "file");		
		$crud->where("idusuario", $usuario["idusuario"] );
		$crud->unsetDelete();
		$crud->unsetAdd();
		$crud->unsetBackToDatagrid();
		$crud->fields(["usuario_idusuario", "foto"]);
		//$output->header_page = Menu::isCompleteProfile()? "Cadastros - Empresas" : "Complete seu perfil para prosseguir";	
		
		$output = $crud->render();
		return  view('crud/index', (array)$output);
	}

}