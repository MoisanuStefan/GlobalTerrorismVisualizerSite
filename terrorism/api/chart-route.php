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
        "route" => "charts",
        "handler" => "getChartData"
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
 
function IsPartOfTeam($req)
{
    if ($req['params']['teamId'] === 'uaic') {
        return true;
    }
 
    Response::status(403);
    Response::json([
        "status" => 403,
        "reason" => "You can only access this teams you're part of!"
    ]);
 
    return false;
}
 
 
function getTeams($req) {
    Response::status(200);
    echo "GET ALL TEAMS" . $req['payload'];
}
 
 
function getTeam($req) {
 
 
    // req['payload']
 
    // DB GET $req['params']['teamId'];
 
    Response::status(200);
    Response::json($req['params']);
   
   
   
    // echo "Get team {$req['params']['teamId']}";
    // $req['params']['teamId'];
 
 
    /// procesare din DB
 
    // $res -> status(200);
        // http_response_code(200)
   
    // $res -> json($payload);
        // header("Content-Type: application/json");
        // echo json_encode($payload);
}
 
function getChartData($req) {
    $modifiedPayload = $req['payload']; 
    //$arr = array('el1' => 'val1', 'el2' => 'val2');
    $model = new MChart();
    $raw_data = $model->getDistinctAndCount($modifiedPayload);
    //echo json_encode({ "data" : "data1" });

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