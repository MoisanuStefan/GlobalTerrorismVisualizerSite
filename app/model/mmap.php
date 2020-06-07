<?php


class MMap{

    private $connection;

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
    }



    public function searchData($array){
		 $sql='SELECT DISTINCT country_txt, latitude, longitude FROM attacks';
        $sqll= $this->createQuery($array);
			$cerere=BD::obtine_conexiune()->prepare($sqll);
			$cerere->execute();
			//echo "MY QUERY IS".$sqll;
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ //echo "no data";
				return 0;
            }
            
			return $msg;

    }

    public function createQuery($array){
		
		$sqll='SELECT country_txt, latitude, longitude  FROM attacks '; 
		$conditions="";
		$firstCondition=1;
		foreach ($array as $i => $value) {
			if ( $value != ''){
				if($firstCondition==1)
				{																
					if($i == 'iyear_l'){
						$conditions=$conditions."   WHERE iyear BETWEEN '$value' ";
					}
					else{
						$conditions=$conditions." WHERE $i = '$value' ";
					}
				
					$firstCondition=0;
				}
				else{
					
					if($i == 'iyear_l'){
						$conditions=$conditions." AND iyear BETWEEN '$value' ";
					}
					else if ($i == 'iyear_h'){
						$conditions=$conditions." AND '$value' ";
					}
					else{
						$conditions=$conditions." AND $i = '$value' ";
					}
				}
			}
		}
		return $sqll.$conditions;
	}

}