<?php


class MMap{

    private $connection;

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
        //echo 'buna ziua';
    }



    public function searchData($array){
		 $sql='SELECT DISTINCT country_txt, latitude, longitude FROM attacks';
        //echo $sql;
        //echo "BAAA";
        $sqll= $this->createQuery($array);
        //echo "<br>MY QUERY IS: ".$sqll;
			$cerere=BD::obtine_conexiune()->prepare($sqll);
			$cerere->execute();
			
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ echo "no data";
            }
            
            
			// foreach($msg as $m)
			// 	{
            //     //echo "<br>country :".$m["country"];
            //     //echo "<br>latitude : ".$m["latid"];
            //     //echo "<br>longitude :".$m["longit"];
			// 	}
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
					if($i == 'year_l'){
						$conditions=$conditions."   WHERE iyear BETWEEN '$value' ";
					}
					else{
						$conditions=$conditions." WHERE $i = '$value' ";
					}
				
					$firstCondition=0;
				}
				else{
					
					if($i == 'year_l'){
						$conditions=$conditions." AND iyear BETWEEN '$value' ";
					}
					else if ($i == 'year_h'){
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