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
    //$modifiedPayload -> id = uniqid();

	$model= new MLogIn();
    $data = json_decode(file_get_contents("php://input"));
	//if (empty($data->user)) echo "no username";
	//if (empty($data->password)) echo "no password";
	//echo "caut userul $data->user parola $data->password:<br>";
	
	$answer=$model->searchUser($data->user,$data->password);
    //echo "<br> raspuns $answer <br>";
    //$respon={"answer: $answer"};
    Response::status(200);
    Response::json($answer);
}