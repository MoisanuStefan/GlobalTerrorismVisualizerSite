<?php


class MChart{
    private $connection;

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
    }

    public function getDistinctAndCount($column,$array){
        
        //$sql = 'SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM attacks GROUP BY ' . $column;

	//creating the query
	$sql2=$this->createQuery($column,$array);
	echo "THIS QUERY: $sql2 <br>";
        $request = $this->connection->prepare($sql2);
        $request->execute();
        return $request->fetchAll();
    }

 
	private function createQuery($column,$array){

		$sqll='SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM attacks '; 
		$conditions="";
		$firstCondition=1;
		foreach ($array as $i => $value) {

			if($firstCondition==1)
			{
				if($i == 'iyear_l'){
					$conditions=$conditions." where iyear between '$array[$i]' ";
				}
				else{
					$conditions=$conditions." WHERE $i = '$array[$i]' ";
				}
			
				$firstCondition=0;
			}
			else{
				
			if($i == 'iyear_l'){
				$conditions=$conditions." and iyear between '$array[$i]' ";
			}
			else if ($i == 'iyear_h'){
				$conditions=$conditions." and '$array[$i]' ";
			}
			else{
				$conditions=$conditions." AND $i = '$array[$i]' ";
			}
			}

		}
		return $sqll.$conditions.'GROUP BY ' . $column;
	}
}
	