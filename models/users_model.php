<?php

class Users_Model extends Model
{
    private $con;

    function __construct()
    {
        require_once "./libs/model.php";
        $db = new Model();
        $this->con = $db->connection();
    }
    
    public function getUserById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }
}
