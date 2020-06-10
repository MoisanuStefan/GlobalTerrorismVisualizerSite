<?php
 include_once "../model/mlogin.php";
include_once "../model/mBD.php";

$chartRoutes = [
    
    [
        "method" => "POST",
        "route" => "logIn",
        "handler" => "searchUser"
    ]

   
];

function searchUser($req) {
    $modifiedPayload = $req['payload'];
	$model= new MLogIn();
    $data = json_decode(file_get_contents("php://input"));
    $responseBody = $model->searchUser($data->user,$data->password);
    Response::status(200);
    Response::json($responseBody);
}