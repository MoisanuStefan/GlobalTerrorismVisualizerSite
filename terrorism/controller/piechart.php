<?php

class PieChart {
   
    private $model;

    function __construct() {
        $this->data = array();

    }

    public function getWhatToGraph(){
        
        if(isset($_POST['graph-me-this'])){

	    // creating the array considering the values inserted by the user in the form
	    $arr=$this->getFormArray();

            $toGraph = $_POST['graph-me-this'];
            $this->model = new MChart();
            $raw_data = $this->model->getDistinctAndCount($toGraph,$arr);
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
	
	
    private function getFormArray(){
	$arr=array();

	//adding a new element into the array if the user specified a special value in the form ( array[column]=columnValue; )
	if(isset($_POST['year']) && $_POST['year']!=NULL) { $year=$_POST['year']; $arr['year']=$year;}
	if(isset($_POST['country']) &&  $_POST['country']!=NULL) { $country=$_POST['country'];  $arr['country']=$country; }
	if(isset($_POST['city']) &&  $_POST['city']!=NULL) { $city=$_POST['city']; $arr['city']=$city;}
	if(isset($_POST['month']) &&  $_POST['month']!=NULL) { $month=$_POST['month'];  $arr['month']=$month;}
	if(isset($_POST['regionCode']) &&  $_POST['regionCode']!=NULL) { $regionCode=$_POST['regionCode'];  $arr['regionCode']=$regionCode;}
	if(isset($_POST['countryCode']) &&  $_POST['countryCode']!=NULL) { $countryCode=$_POST['countryCode'];  $arr['countryCode']=$countryCode;}

	return $arr;
	}

}