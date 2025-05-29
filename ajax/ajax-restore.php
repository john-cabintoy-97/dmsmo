<?php
session_start();
require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if (isset($_POST['restore_employee'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $param = [
        'users_id' => $id,
        'status' => 'restored',
    ];
    $result = $db->query("UPDATE users SET status = :status WHERE users_id = :users_id", $param);
    if ($result) {
        echo "ok";
    } else {
        "unable";
    }
}

if (isset($_POST['restore_file'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $param = [
        'do_id' => $id,
        'status' => 'restored',
    ];
    $result = $db->query("UPDATE file_documents SET status = :status WHERE do_id = :do_id", $param);
    if ($result) {
        echo "ok";
    } else {
        "unable";
    }
}

if (isset($_POST['restore_in'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $param = [
        'in_id' => $id,
        'status' => 'restored',
    ];
    $result = $db->query("UPDATE incoming_file SET status = :status WHERE in_id  = :in_id ", $param);
    if ($result) {
        echo "ok";
    } else {
        "unable";
    }
}

if (isset($_POST['restore_out'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $param = [
        'out_id' => $id,
        'status' => 'restored',
    ];
    $result = $db->query("UPDATE outgoing_file SET status = :status WHERE out_id  = :out_id ", $param);
    if ($result) {
        echo "ok";
    } else {
        "unable";
    }
}
