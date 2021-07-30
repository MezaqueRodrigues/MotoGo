<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function site()
	{
		$data = array("header_page"=> "Painel de Controle");
		return  view('template/site/index', $data);
	}

	public function restrito()
	{
		$data = array("header_page"=> "Painel de Controle");
		return  view('main/index', $data);
	}

	public function contato()
	{
		$data = array("header_page"=> "Contato");
		return  view('main/contato', $data);
	}

}
