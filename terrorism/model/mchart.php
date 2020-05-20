<?php


class MChart{
    private $connection;

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
    }

    public function getDistinctAndCount($column,$array){
        
        //$sql = 'SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM data1 GROUP BY ' . $column;

	//creating the query
	$sql2=$this->createQuery($column,$array);
	echo "THIS QUERY: $sql2 <br>";
        $request = $this->connection->prepare($sql2);
        $request->execute();
        return $request->fetchAll();
    }

 
	private function createQuery($column,$array){

		$sqll='SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM data1 '; 
		$conditions="";
		$firstCondition=1;
		foreach ($array as $i => $value) {
		if($firstCondition==1)
		{
			$conditions=$conditions." WHERE $i = '$array[$i]' ";
			$firstCondition=0;
		}
		else
		$conditions=$conditions." AND $i = '$array[$i]' ";

		}
		return $sqll.$conditions.'GROUP BY ' . $column;
	}
}
	