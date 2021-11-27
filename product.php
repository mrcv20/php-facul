<?php
class Product
{
    // dbection
    private $db;
    // Table
    private $db_table = "product";
    // Columns
    public $id;
    public $name;
    public $type;
    public $price;
    public $description;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL
    public function getProducts()
    {
        $sqlQuery = "SELECT id, name, type, price, description FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createProduct()
    {
        // sanitize
        $sqlQuery = "INSERT INTO
" . $this->db_table . " SET name = '" . $this->name . "',
type = '" . $this->type . "',
price = '" . $this->price . "',description = '" . $this->description . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleProduct()
    {
        $sqlQuery = "SELECT id, name, type, price, description FROM
" . $this->db_table . " WHERE id = " . $this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->name = $dataRow['name'];
        $this->type = $dataRow['type'];
        $this->price = $dataRow['price'];
        $this->description = $dataRow['description'];
    }

    // UPDATE
    public function updateProduct()
    {
        $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "',
type = '" . $this->type . "',
price = '" . $this->price . "',description = '" . $this->description . "'
WHERE id = " . $this->id;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteProduct()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
