<?php
 
include_once "../model/mMap.php";
include_once "../model/mBD.php";
 
$chartRoutes = [
    [
        "method" => "POST",
        "middlewares" => ["isLoggedIn"],
        "route" => "map",
        "handler" => "getMapData"
    ]

   
];

 
function getMapData($req) {
    $modifiedPayload = $req['payload'];
    $model = new MMap();
    $raw_data=$model->searchData($modifiedPayload);
    $data = array();
    $index = 0;
        foreach($raw_data as $line){
                $data[$index] = array();  
                $data[$index]['title'] = $line['country_txt']; 
                $data[$index]['latitude'] = floatval($line['latitude']);
                $data[$index]['longitude'] = floatval($line['longitude']);
                $index++;
                if($index>10) break;
            }
    Response::status(200);
    Response::json($data);
}


