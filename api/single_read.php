<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

include_once '../database.php';
include_once '../product.php';
$database = new Database();
$db = $database->getConnection();
$item = new Product($db);

$entityBody = json_decode(file_get_contents('php://input'), true);

$item->id = isset($entityBody['id']) ? $entityBody['id'] : die();
$item->getProducts();
if ($item->name != null) {
    // CREATE ARRAY
    $emp_arry = array(
        "id" => $item->id,
        "name" => $item->name,
        "type" => $item->type,
        "price" => $item->price,
        "description" => $item->description
    );
    http_response_code(200);
    echo json_encode($emp_arr);
} else {
    http_response_code(404);
    echo json_encode("Product not found");
}
