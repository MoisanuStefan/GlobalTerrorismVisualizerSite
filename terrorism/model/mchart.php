<?php
class BD2{
    private static $conexiune_bd= NULL;
    public static function obtine_conexiune()
    {
        if(is_null(self::$conexiune_bd))
        {
        self::$conexiune_bd =new PDO('mysql:host=localhost;dbname=tevi','stef','stef');
        }
        return self::$conexiune_bd;
    }
}


class MChart{
    private $connection;

    public function __construct(){
        $this->connection = BD2::obtine_conexiune();
    }

    public function getDistinctAndCount($column){
        
        $sql = 'SELECT ' . $column . ' as to_graph, COUNT(' . $column . ') AS value FROM data1 GROUP BY ' . $column;
        $request = $this->connection->prepare($sql);
        $request->execute();
        return $request->fetchAll();
    }
}
	