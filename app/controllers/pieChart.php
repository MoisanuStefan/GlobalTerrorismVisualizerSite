<?php

class PieChart extends Controller{
    public $data;
    public $json;

    function __construct() {
        $this->data = array();
    }

    public function getJson(){
        $this->data[0] = array();
        $this->data[0]['country'] = "Rom";
        $this->data[0]['value'] = 400;
        $this->data[1] = array();
        $this->data[1]['country'] = "alta";
        $this->data[1]['value'] = 30;
        $this->data[2] = array();
        $this->data[2]['country'] = "sua"; 
        $this->data[2]['value'] = 500;
        $this->json = json_encode($this->data);
        return $this->json;

    }


}