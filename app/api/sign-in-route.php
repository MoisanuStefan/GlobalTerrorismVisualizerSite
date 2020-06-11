<<<<<<< HEAD
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
    $data = $req['payload'];
   
	$model= new MLogIn();
    $responseBody = $model->searchUser($data->user,$data->password);
    Response::status(200);
    Response::json($responseBody);
=======
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
    $data = $req['payload'];
   
	$model= new MLogIn();
    $responseBody = $model->searchUser($data->user,$data->password);
    Response::status(200);
    Response::json($responseBody);
>>>>>>> a970f1e3a534c40bde482ad4a16985e8dec28cc5
}