<?php 

namespace App\Libraries;

use App\Models\EmpresaModel;
use App\Models\MotoboyModel;

class Menu{

    public function getProfileUser(){
        //obtém o email do usuario logado
        $session = session();
        $usuario = $session->get("usuario");              
        return view('template/admin/rowUserProfile', $usuario);
    }

    public static function getUser(){
        $session = session();
        return $session->get("usuario"); 
    }

    public static function isCompleteProfile(){
        $session = session();
        $usuario = $session->get("usuario"); 
        if($usuario["tipo"]=="Motoboy"){
			$model = new MotoboyModel();
        }else if($usuario["tipo"]=="Empresa"){
            $model = new EmpresaModel();
        }

        if($model){
            $perfil = $model->where("usuario_idusuario", $usuario["idusuario"])->first();
			if($perfil){
                return true;
            }
        }
        return false;
    }
}