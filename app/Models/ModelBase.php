<?php 

namespace App\Models;
use App\Models\Database;

class ModelBase extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert ($table, $datas)
    {
        $keys = array_keys($datas);
        $sql= "INSERT INTo $table (" .implode(", ", $keys) . ") \n";
        $sql .= "VALUES ( :" . implode(" ,", $keys). ")";
        $q = $this->db->prepare($sql);
        return $q->execute($datas);
    }
}