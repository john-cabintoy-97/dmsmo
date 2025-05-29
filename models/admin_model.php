<?php

class Admin_Model extends Model
{
    private $con;

    function __construct()
    {
        require_once "./libs/model.php";
        $db = new Model();
        $this->con = $db->connection();
    }

    public function getAllUsers()
    {
        $stmt = $this->con->prepare("SELECT * FROM users ORDER BY users_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllOutgoing()
    {
        $stmt = $this->con->prepare("SELECT * FROM outgoing_file ORDER BY out_id  ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getAllIncoming()
    {
        $stmt = $this->con->prepare("SELECT * FROM incoming_file ORDER BY in_id  ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getAllDocuments()
    {
        $stmt = $this->con->prepare("SELECT * FROM file_documents ORDER BY do_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUsersById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM users  WHERE users_id = :users_id");
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }

    public function getDocuById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM file_documents WHERE do_id = :do_id");
        $stmt->execute(['do_id' => $id]);
        return $stmt->fetch();
    }
    public function getAllLogs()
    {
        $stmt = $this->con->prepare("SELECT * FROM system_log ORDER BY syslog_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function convertBytes($fileSize)
    {
        if ($fileSize >= 1073741824) {
            $fileSize = number_format($fileSize / 1073741824, 2) . ' GB';
        } elseif ($fileSize >= 1048576) {
            $fileSize = number_format($fileSize / 1048576, 2) . ' MB';
        } elseif ($fileSize >= 1024) {
            $fileSize = number_format($fileSize / 1024, 2) . ' KB';
        } else {
            $fileSize = $fileSize . ' bytes';
        }

        return $fileSize;
    }

    public function getProfileById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }

    public function urlEncode($url)
    {
        return urlencode(base64_encode($url));
    }
    public function urlDecode($url)
    {
        return base64_decode(urldecode($url));
    }

    public function countUser()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS user_count FROM users ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countFile()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS count FROM file_documents WHERE status != 'archived'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countArchived()
    {
        $stmt = $this->con->prepare("SELECT (
            (SELECT COUNT(*) FROM file_documents WHERE status = 'archived') +
            (SELECT COUNT(*) FROM incoming_file WHERE status = 'archived') +
            (SELECT COUNT(*) FROM outgoing_file WHERE status = 'archived') +
            (SELECT COUNT(*) FROM users WHERE status = 'archived')
          ) AS count;");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function countShared()
    {
        $stmt = $this->con->prepare("SELECT (
            (SELECT COUNT(*) FROM incoming_file WHERE status != 'archived' ) +
            (SELECT COUNT(*) FROM outgoing_file WHERE status != 'archived') 
          ) AS count;");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
