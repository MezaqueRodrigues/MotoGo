<?php

namespace App\Libraries;

class ViewCreator{

    var $addCreate = false;

    public function setControllerURL($url){
        $this->controller_url = site_url($url);
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function setPrimaryKey($id){
        $this->id = $id;
    }

    public function crudActions($action){
        $acoes = str_split($action);
        foreach($acoes as $a){
            switch($a){
                case "C": $this->addCreate = true; break;                
                case "R": $this->addAction("Mostrar", "fas fa-search", "restrito/usuario/index/read", null); break;                
                case "U": $this->addAction("Editar", "far fa-edit", "restrito/usuario/index/edit", null); break;
                case "D": $this->addAction("Excluir", "far fa-trash-alt", "restrito/usuario/delete", null); break;                
            }
        }
    }

    public function addAction($label, $icon, $url, $f){
        $this->action[] = array("label"=>$label, "icon"=>$icon, "url"=>base_url($url), "show"=> $f);
    }

    public function setColumns($columns){
        $this->columns = $columns;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function render(){
        return view('view_creator/list', (array)$this);
    }
}