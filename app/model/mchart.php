<?php


class MChart{
    private $connection;
	private $filterArray = Array();

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
		$this->setFilterArray();
		$sqll='SELECT ' . $array->column . ' as to_graph, COUNT(' . $array->column . ') AS value FROM attacks ' . $this->filterArray[$array->column]; 
		$conditions="";
		$firstCondition=1;
		foreach ($array as $i => $value) {
			if ($i != 'column' && $value != ''){
				
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
		
		return $sqll.$conditions.'GROUP BY ' . $array->column;
	}

	private function setFilterArray(){
		$this->filterArray['country_txt'] = " where country_txt in						 ";
		$this->filterArray['weaptype1_txt'] = " where weaptype1_txt in ('Explosives', 'Firearms', 'Chemical', 'Incendiary', 'Melee', 'Unknown') ";
		$this->filterArray['iyear'] = " where iyear not in (-1)";
		$this->filterArray['attacktype1_txt'] = " where attacktype1_txt in ('Bombing/Explosion', 'Armed Assault', 'Assassination', 'Facility/Infrastructure Attack', 'Hostage Taking (Kidnapping)', 'Insurgency/Guerilla Action', 'Hostage Taking (Barricade Incident)', 'Unarmed Assault' , 'Hijacking' )";
		$this->filterArray['targtype1_txt'] = " where targtype1_txt in ('Private Citizens & Property', 'Business', 'Military', 'Government (General)', 'Police', 'Utilities', 'Transportation', 'Government (Diplomatic)', 'Journalists & Media', 'Educational Institution', 'Religious Figures/Institutions', 'Airports & Aircraft', 'Telecommunication', 'NGO', 'Tourists', 'Maritime' ) ";
		$this->filterArray['success'] = " where success in ('1', '0') ";
		$this->filterArray['suicide'] = " where success in ('1', '0') ";
	}
}
	