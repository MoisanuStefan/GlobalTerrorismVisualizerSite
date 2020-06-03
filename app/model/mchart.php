<?php


class MChart{
    private $connection;

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
    }

	public function getByCountry($country, $limit){
		$sql = 'Select * from attacks where country_txt = \'' . $country . '\'';
		if ($limit > 0){
			$sql = $sql . 'limit ' . $limit;
		}
		$request = $this->connection->prepare($sql);
        $request->execute();
        return $request->fetchAll();
	}
    public function getDistinctAndCount($queryData){
        
        //$sql = 'SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM attacks GROUP BY ' . $column;

		//creating the query
		$sql2=$this->createQuery($queryData);
        $request = $this->connection->prepare($sql2);
        $request->execute();
        return $request->fetchAll();
    }


	private function createQuery($array){
		
		$sqll='SELECT ' . $array->column . ' as to_graph, COUNT(' . $array->column . ') AS value FROM attacks '; 
		$conditions="";
		$firstCondition=1;
		foreach ($array as $i => $value) {
			if ($i != 'column' && $value != ''){
				if($firstCondition==1)
				{																
					if($i == 'iyear_l'){
						$conditions=$conditions." where iyear between '$value' ";
					}
					else{
						$conditions=$conditions." WHERE $i = '$value' ";
					}
				
					$firstCondition=0;
				}
				else{
					
					if($i == 'iyear_l'){
						$conditions=$conditions." and iyear between '$value' ";
					}
					else if ($i == 'iyear_h'){
						$conditions=$conditions." and '$value' ";
					}
					else{
						$conditions=$conditions." AND $i = '$value' ";
					}
				}
			}
		}
		return $sqll.$conditions.'GROUP BY ' . $array->column;
	}
}
	