<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST,GET,PUT,DELETE");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
// Get Database Connection
include '../controller/SekolahController.php';
$ctrl = new SekolahController();
$request = $_SERVER['REQUEST_METHOD'];
switch ($request) {
    case 'GET':
        $ctrl->getStatus();
        break;
    case 'POST':
        $ctrl->setStatus();
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
    default:
        http_response_code(404);
        echo 'Request tidak diizinkan';
}
