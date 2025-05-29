
<?php
//SYSTEM CONFIGURATION 
define('PAGE_TITLE', 'DMSMO');
define('TITLE', 'Document Management System of Memorandum Order');

class SystemConfig
{
    // database credentials
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'dmsmo';

    private $tbl = 'users';

    // default administrator
    private $name = "administrator";
    private $password = 'admin123';
    private $email = "admin@admin.com";
    private $user_type = "administrator"; // default role 


    function __construct()
    {
    }

    public function adminData()
    {
        $data = array(
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => $this->user_type,
        );

        return $data;
    }

    public function databaseData()
    {
        $data = array(
            'db_host' => $this->db_host,
            'db_user' => $this->db_user,
            'db_pass' => $this->db_pass,
            'db_name' => $this->db_name,
        );

        return $data;
    }

    public function tableData()
    {
        return $this->tbl;
    }
}
?>