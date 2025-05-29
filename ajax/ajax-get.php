<?php

session_start();
require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['get_users'])) {
        $id = filter_var(trim($_POST['users_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
        $stmt->execute(['users_id' => $id]);
        $data = json_encode($stmt->fetch());
        echo $data;
    }
    if (isset($_POST['get_incoming'])) {
        $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $stmt = $conn->prepare("SELECT * FROM incoming_file WHERE in_id = :in_id");
        $stmt->execute(['in_id' => $id]);
        $fetch = $stmt->fetch();

        $json_string = json_encode($fetch);
        if ($fetch) {
            $stmt = $conn->prepare("SELECT * FROM file_documents WHERE do_id = :do_id");
            $stmt->execute(['do_id' => $fetch->do_id]);
            $result = $stmt->fetch();
            $data = json_decode($json_string);
            $data->documents = $result->filename;
            $json_new = json_encode($data);
            echo $json_new;
        }
    }

    if (isset($_POST['get_outgoing'])) {
        $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $stmt = $conn->prepare("SELECT * FROM outgoing_file WHERE out_id = :out_id ");
        $stmt->execute(['out_id' => $id]);
        $fetch = $stmt->fetch();

        $json_string = json_encode($fetch);
        if ($fetch) {
            $stmt = $conn->prepare("SELECT * FROM file_documents WHERE do_id = :do_id");
            $stmt->execute(['do_id' => $fetch->do_id]);
            $result = $stmt->fetch();
            $data = json_decode($json_string);
            $data->documents = $result->filename;
            $json_new = json_encode($data);
            echo $json_new;
        }
    }
    if (isset($_POST['fetch_total_users'])) {
        $sql = "SELECT * FROM users GROUP BY users_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if (isset($_POST['fetch_memos'])) {
        $sql = "SELECT * FROM outgoing_file GROUP BY timestamp";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if (isset($_POST['fetch_Inmemos'])) {
        $sql = "SELECT * FROM incoming_file ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if (isset($_POST['incomingreport'])) {
        $sql = "SELECT MONTHNAME(timestamp) as month, COUNT(*) as count FROM incoming_file GROUP BY MONTH(timestamp)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if (isset($_POST['outgoingsreport'])) {
        $sql = "SELECT MONTHNAME(timestamp) as month, COUNT(*) as count FROM outgoing_file GROUP BY MONTH(timestamp)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if (isset($_POST['usersreport'])) {
        $sql = "SELECT user_type, COUNT(*) as count FROM users GROUP BY user_type";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
