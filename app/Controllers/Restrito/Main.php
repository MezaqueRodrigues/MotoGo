<?php namespace App\Controllers\Restrito;

use App\Controllers\BaseController;
use App\Libraries\Menu;

class Main extends BaseController
{
	public function site(){
		
		$data = array("header_page"=> "Painel de Controle");
		return  view('main/index', $data);	
	}
}