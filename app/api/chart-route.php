<?php
 
include_once "../model/mchart.php";
include_once "../model/mBD.php";
include_once "../model/madmin.php";

 
$chartRoutes = [
    [
        "method" => "POST",
        "middlewares" => ["isLoggedIn"],
        "route" => "statistics",
        "handler" => "getChartData"
    ],

    [
        "method" => "GET",
        "route" => "attacks/:country",
        "handler" => "getChartDataByCountry"
    ],
      
    //stergere atac
    [
        "method" => "DELETE",
        "route" => "attacks/:id",
        "handler" => "deleteAttack"
    ],

    //adaugare atac
    [
        "method" => "POST",
        "route" => "attacks",
        "handler" => "addAttack"
    ],

    //de pus route pt useri --------------------------
    //stergere user
    [
        "method" => "DELETE",
        "route" => "users/:user",
        "handler" => "deleteUser"
    ],

    //update admin 
    [
        "method" => "PUT",
        "route" => "users",
        "handler" => "operateAdmin"
    ]

];
 
 
function addAttack($req)
{
   $model = new MAdmin();
   $payload = $req['payload'];  
   $model->insertAtt($payload);
   $response = array();
   $response['response'] = 'Attack inserted';
   Response::status(200);
   Response::json($response);  

}

function deleteAttack($req)
{
   $model = new MAdmin();
   $idA=$req['params'];

   $id=$idA['id'];
   $model->deleteAtt($id);
   $response = array();
   $response['response'] = 'Attack deleted';
   Response::status(200);
   Response::json($response);
   
}

 //----------------------------------------------------
function deleteUser($req)
{
   $model = new MAdmin();
   $id=$req['params']['user'];
   $model->deleteUser($id);
   $response = array();
   $response['response'] = 'User deleted';
   Response::status(200);
   Response::json($response);
   
}

function operateAdmin($req)
{
    $model = new MAdmin();
    $payload = $req['payload'];  
    $model->operateUser($payload);
    $response = array();
    $response['response'] = 'User updated';
    Response::status(200);
    Response::json($response);  
   
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
    
    $model = new MChart();
    $raw_data = $model->getByCountry($country);

    if($raw_data==NULL){
        Response::status(204); // no content
        exit();
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

