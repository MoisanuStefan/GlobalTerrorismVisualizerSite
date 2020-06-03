<?php
 
include_once "../model/mchart.php";
include_once "../model/mBD.php";
class Response {
    static function status($code) {
        http_response_code($code);
    }
 
    static function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
 
$chartRoutes = [
    [
        "method" => "POST",
        "route" => "statistics",
        "handler" => "getChartData"
    ],

    [
        "method" => "GET",
        "route" => "attacks/:country",
        "handler" => "getChartDataByCountry"
    ],

    [
        "method" => "GET",
        "route" => "attacks/:country/:count",
        "handler" => "getChartDataByCountry"
    ]
];
 
 
function IsLoggedIn()
{
    $allHeaders = getallheaders();
 
    if (isset($allHeaders['Authorization'])) {
        return true;
    }
 
    Response::status(401);
    Response::json([
        "status" => 401,
        "reason" => "You can only access this route if you're authenticated!"
    ]);
 
    return false;
}
 
function getChartData($req) {
    $modifiedPayload = $req['payload']; 
    $model = new MChart();
    $raw_data = $model->getDistinctAndCount($modifiedPayload);

    if($raw_data==NULL){
        Response::status(204); // no content
    }

    $data = array();
    $index = 0;
    foreach($raw_data as $line){
        $data[$index] = array();
        $data[$index]['to_graph'] = $line['to_graph'];
        $data[$index]['value'] = intval($line['value']);  
        $index++;
    }
    
    Response::status(200);
    Response::json($data);
}

function getChartDataByCountry($req){
    $country = $req['params']['country']; 
    $limit = 0;
    if(isset( $req['params']['count'])){
        $limit = $req['params']['count'];
    }
    
    $model = new MChart();
    $raw_data = $model->getByCountry($country, $limit);

    if($raw_data==NULL){
        Response::status(204); // no content
    }
    $index = 0;
    $data = array();
    foreach($raw_data as $line){
        $data[$index] = array();
        foreach($line as $key => $value){

            if (!is_numeric($key)){
                $data[$index][$key] = $value;
            }
        }
        $index = $index + 1;
    }
    
    Response::status(200);
    Response::json($data);
   
}

