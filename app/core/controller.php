<?php

class Controller
{
    public function get_model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function get_view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    
    }
}