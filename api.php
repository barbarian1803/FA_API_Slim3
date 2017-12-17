<?php

$path_to_root = "../..";
$SysPrefs = "";
$Refs = "";
$security_areas = "";
$security_sections = "";

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

require_once 'middleware/Auth.php';
require_once 'middleware/AccessLevel.php';

require_once 'api/RouteClass.php';

$app = new \Slim\App;

$app->group('/v1/',function(){
    global $path_to_root;
    require 'routes/customer_routes.php';
})->add(Auth::class);

$app->run();
