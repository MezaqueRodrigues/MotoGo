<?php namespace App\Controllers\Restrito\Empresa;

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
	    $crud->setTable('empresa');
		$crud->setSubject("Empresa");
		$crud->columns(["usuario_idusuario", "cnpj", "telefone"]);			
		$crud->fieldType("usuario_idusuario", "hidden", $usuario["idusuario"]);			
		$crud->where("usuario_idusuario", $usuario["idusuario"] );
		$crud->unsetDelete();
		$crud->unsetAdd();
		$crud->unsetBackToDatagrid();
	    $output = $crud->render();
		$output->header_page = Menu::isCompleteProfile()? "Cadastros - Empresas" : "Complete seu perfil para prosseguir";	
		return  view('crud/index', (array)$output);
	}

}