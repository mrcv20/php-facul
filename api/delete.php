<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../product.php';
$database = new Database();
$db = $database->getConnection();
$item = new Product($db);

$entityBody = json_decode(file_get_contents('php://input'), true);

$item->id = isset($entityBody['id']) ? $entityBody['id'] : die();

if ($item->deleteProduct()) {
    echo json_encode("Employee deleted.");
} else {
    echo json_encode("Data could not be deleted");
}
