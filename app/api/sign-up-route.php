<?php
 include_once "../model/mlogin.php";
include_once "../model/mBD.php";

$chartRoutes = [
    [
        "method" => "POST",
        "route" => "signUp",
        "handler" => "insertUser"
    ]

   
];


function insertUser($req) {
    $modifiedPayload = $req['payload'];
    //$modifiedPayload -> id = uniqid();

	$model= new MLogIn();
    $data = json_decode(file_get_contents("php://input"));

	//if (empty($data->name)) echo "no name";
	//if (empty($data->user)) echo "no username";
	//if (empty($data->password)) echo "no password";
	//echo "bag in baza de date userul $data->user parola $data->password:<br>";
	$model->insertUser($data->name, $data->user,$data->password);
    Response::status(200);
    Response::json($modifiedPayload);
}

