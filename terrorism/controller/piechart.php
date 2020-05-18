<?php

class PieChart {
   
    private $model;

    function __construct() {
        $this->data = array();

    }

    public function getWhatToGraph(){
        
        if(isset($_POST['graph-me-this'])){
            $toGraph = $_POST['graph-me-this'];
            $this->model = new MChart();
            $raw_data = $this->model->getDistinctAndCount($toGraph);
            if($raw_data==NULL){
                echo 'no data in database';
            }
            $data = array();
            $index = 0;
            foreach($raw_data as $line){
                $data[$index] = array();
                $data[$index]['to_graph'] = $line['to_graph'];
                $data[$index]['value'] = $line['value'];  
                $index++;
            }
            return $data;
        }
        
    }
    public function getJson(){
        $data = $this->getWhatToGraph();
        return json_encode($data);
    
    }


}