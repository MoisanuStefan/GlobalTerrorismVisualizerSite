<?php

class Home extends Controller{
    public function __construct(){
    }
    public function index($name = 'default', $name2 = 'default 2'){
        echo 'params:' . $name . ' ' . $name2;
    }
    public function set_model_name($model ='', $name = ''){
        $loaded_model = $this->get_model($model);
        $loaded_model->name = $name;
        echo $loaded_model->name;
    }
    public function load_view($view){
        $this->get_view($view);
    }
}