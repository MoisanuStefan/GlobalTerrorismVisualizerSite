<?php
 include_once "../model/mlogin.php";
include_once "../model/mBD.php";

class Response1 {
    static function status($code) {
        http_response_code($code);
    }
 
    static function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

 


function insertUser($req) {
    $modifiedPayload = $req['payload'];
    //$modifiedPayload -> id = uniqid();

	$model= new MLogIn();
    $data = json_decode(file_get_contents("php://input"));

	//if (empty($data->name)) echo "no name";
	//if (empty($data->user)) echo "no username";
	//if (empty($data->password)) echo "no password";
	echo "bag in baza de date numele $data->name userul $data->user parola $data->password:<br>";
	$model->insertUser($data->user,$data->password);
    Response::status(200);
    Response::json($modifiedPayload);
}

function searchUser($req) {
    $modifiedPayload = $req['payload'];
    //$modifiedPayload -> id = uniqid();

	$model= new MLogIn();
    $data = json_decode(file_get_contents("php://input"));
	if (empty($data->user)) echo "no username";
	if (empty($data->password)) echo "no password";
	//echo "caut userul $data->user parola $data->password:<br>";
	
	$answer=$model->searchUser($data->user,$data->password);
    echo "<br> raspuns $answer <br>";
    Response::status(200);
    Response::json($modifiedPayload);
}