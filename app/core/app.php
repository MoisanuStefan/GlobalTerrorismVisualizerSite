<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseUrl();

        // if controller exists I get it from the first element of url, otherwise remains set to home
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller; // set the actual controller object  
        
        if(isset($url[1])){
            
            if(method_exists($this->controller, $url[1])){
                
                $this->method = $url[1];
                unset($url[1]);
                
            }
        }
        $this->params = $url ? array_values($url) : []; // rebase array of params to start from 0, or empty array if there are none
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    
    }

    public function parseUrl(){

        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)); // rtrim eliminates extra / and filter sanatizez (keeps what is safe, no malicios code)
        }
    }
}