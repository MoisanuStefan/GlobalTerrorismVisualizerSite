<<<<<<< HEAD
<?php
 
include_once "../model/mMap.php";
include_once "../model/mBD.php";
 
$chartRoutes = [
    [
        "method" => "POST",
        "middlewares" => ["isLoggedIn"],
        "route" => "maps",
        "handler" => "getMapData"
    ]
   
];

 /**
  * The function gets the raw data from the model, considering the users options, and creates and returns it in JSON format
  */
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
                $data[$index]['color'] = '#997300';
                $index++;
                if($index>10) break;
            }
    Response::status(200);
    Response::json($data);
}


=======
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

 /**
  * The function gets the raw data from the model, considering the users options, and creates and returns it in JSON format
  */
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
                $data[$index]['color'] = '#997300';
                $index++;
                if($index>10) break;
            }
    Response::status(200);
    Response::json($data);
}


>>>>>>> a970f1e3a534c40bde482ad4a16985e8dec28cc5
