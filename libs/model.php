<?php
require __DIR__ . '/../config/system.php';

class Model extends SystemConfig
{
  private $conn;
  private $user_tbl;
  private $admin;
  private $database;
  private $mailer;

  public function __construct()
  {
    $config = new SystemConfig();
  
    // set database credentials
    $this->database = $config->databaseData();
    // set admin credentials
    $this->admin = $config->adminData();
    // set user table name
    $this->user_tbl = $config->tableData();
   
    try {
      $datasource = "mysql:host=" . $this->database['db_host'] . ";dbname=" . $this->database['db_name'];
      $this->conn = new PDO($datasource, $this->database['db_user'], $this->database['db_pass']);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (DOException $exception) {
      exit('Failed to connect to database!');
    }
  }
  public function connection()
  {
    return $this->conn;
  }

  public function query($sql, $param)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($param);
  }

  public function close()
  {
    return $this->conn = null;
  }

  public function loadAdmin()
  {
    // Check if the users table already exists
    $query = "SHOW TABLES LIKE :table_name";
    $table_name = $this->user_tbl . '%';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':table_name',  $table_name);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $table_exists = count($results) > 0;
    if ($table_exists) {
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_type = :user_type");
      $stmt->execute(['user_type' => 'administrator']);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (count($result) <= 0) {
        $param = [
          'name' => trim($this->admin['name']),
          'email' => trim($this->admin['email']),
          'password' => password_hash($this->admin['password'], PASSWORD_BCRYPT),
          'user_type' => $this->admin['user_type']
        ];
        $result = $this->query("INSERT INTO users (`name`, `email`, `password`, `user_type`) VALUES (:name, :email, :password, :user_type)", $param);
        if ($result) {
          // User created successfully
        } else {
          echo "Error creating user.";
          return false;
        }
      }
    } else {
      $query = "CREATE TABLE $this->user_tbl (
        `users_id` int(11)  AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(256) NOT NULL,
        `email` varchar(256) NOT NULL,
        `password` varchar(256) NOT NULL,
        `user_type` varchar(100) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      )";

      $stmt = $this->conn->prepare($query);
      $result = $stmt->execute();
      if ($result) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE user_type = :user_type");
        $stmt->execute(['user_type' => 'administrator']);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
          $param = [
            'name' => trim($this->admin['name']),
            'email' => trim($this->admin['email']),
            'password' => password_hash($this->admin['password'], PASSWORD_BCRYPT),
            'user_type' => $this->admin['user_type']
          ];
          $result = $this->query("INSERT INTO users (`name`, `email`, `password`, `user_type`) VALUES (:name, :email, :password, :user_type)", $param);
          if ($result) {
            // User created successfully
          } else {
            echo "Error creating user.";
            return false;
          }
        }
      } else {
        echo "Error creating table: " . $stmt->errorInfo()[2];
        exit();
      }
    }
  }
}
