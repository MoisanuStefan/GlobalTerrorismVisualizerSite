


<?php

require_once "./chart-route.php";
require_once "./sign-up-route.php";
require_once "./map-route.php";
require_once "./sign-in-route.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$allHeaders = getallheaders();

//foreach ($loginRoutes as $i => $value) {
//    $allRoutes[$i]=$value;
//}


$allRoutes =  [
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
    [
        "method" => "POST",
        "middlewares" => ["isLoggedIn"],
        "route" => "map",
        "handler" => "getMapData"
    ],
    [
        "method" => "POST",
        "route" => "signUp",
        "handler" => "insertUser"
    ],
    [
        "method" => "POST",
        "route" => "logIn",
        "handler" => "searchUser"
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

foreach ($allRoutes as $routeConfig) {
    
    if (parseRequest($routeConfig)) {
        exit;
    }
}

Response::status(404);
Response::json(['response' => 'invalid url']);



function parseRequest($routeConfig)
{
    // regexp match 
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    
    if ($method !== $routeConfig['method']) {
        return false;
    }
    $regExpString = routeExpToRegExp($routeConfig['route']);
    


    if (preg_match("/$regExpString/", $url, $matches)) {
        $params = [];
        $query = [];
        $parts = explode('/', $routeConfig['route']);

        // Params
        $index = 1;
        foreach ($parts as $p) {
            if ($p[0] === ':') {
                $params[substr($p, 1)] = $matches[$index];
                $index++;
            }
        }
        // Query
        if (strpos($url, '?')) {
            $queryString = explode('?', $url)[1];
            $queryParts = explode('&', $queryString);

            foreach ($queryParts as $part) {
                if (strpos($part, '=')) {
                    $query[explode('=', $part)[0]] = explode('=', $part)[1];
                }
            }
        }

        // Payload
        $payload = file_get_contents('php://input');
        if (strlen($payload)) {
         
            $payload = json_decode($payload);
        } else {
            $payload = NULL;
        }
        

        // if middlewares =>  run them first

        if (isset($routeConfig['middlewares'])) {

            foreach ($routeConfig['middlewares'] as $middlewareName) {
                $didPass = call_user_func($middlewareName, [
                    "params" => $params,
                    "query" => $query,
                    "payload" => $payload
                ]);
                if (!$didPass) {
                    exit();
                }
            }
        }
        
        call_user_func($routeConfig['handler'], [
            "params" => $params,
            "query" => $query,
            "payload" => $payload
        ]);

        return true;
    }

    return false;
}

function handle404()
{
    // Response::status(404);
}



function routeExpToRegExp($route)
{
    $regExpString = "";
    $parts = explode('/', $route);

    foreach ($parts as $p) {
        $regExpString .= '\/';

        if ($p[0] === ':') {
            $regExpString .= '([a-zA-Z0-9]+)';
        } else {
            $regExpString .= $p;
        }
    }
    $regExpString .= '$';

    return $regExpString;
}


class Response {
    static function status($code) {
        http_response_code($code);
    }
 
    static function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}


function isLoggedIn($req)
{
    $allHeaders = getallheaders();

    if ($allHeaders['authorization'] != 'none') {
        return true;
    }
    
    Response::status(401);
    Response::json([
        "status" => 401,
        "reason" => "You can only access this route if you're logged in!"
    ]);
 
    return false;
}