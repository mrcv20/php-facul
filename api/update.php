
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new Product($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->name = $_GET['name'];
$item->type = $_GET['type'];
$item->price = $_GET['price'];
$item->description = $_GET('description');
if ($item->updateProduct()) {
    echo json_encode("Product data updated.");
} else {
    echo json_encode("Data could not be updated");
}
?>