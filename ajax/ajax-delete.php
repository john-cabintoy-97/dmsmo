<?php
session_start();
require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if (isset($_POST['delete_users'])) {
    $id = filter_var(trim($_POST['users_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
    $insession = filter_var(trim($_POST['insession']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $insession]);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $hash = $result->password;
        if (password_verify($password, $hash)) {
            $param = [
                'users_id' => $id,
            ];
            $result = $db->query("DELETE FROM users WHERE users_id = :users_id", $param);
            if ($result) {
                echo "delete";
            } else {
                "unable";
            }
        } else {
            echo "wrong";
        }
    }
}

if (isset($_POST['delete_file'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
    $insession = filter_var(trim($_POST['insession']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $insession]);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $hash = $result->password;
        if (password_verify($password, $hash)) {

            $stmt = $conn->prepare("SELECT * FROM file_documents WHERE do_id = :do_id");
            $stmt->execute(['do_id' => $id]);
            if ($stmt->rowCount() > 0) {
                $res = $stmt->fetch();

                $param = [
                    'do_id' => $id,
                ];
                $result = $db->query("DELETE FROM file_documents WHERE do_id = :do_id", $param);
                if ($result) {
                    if (unlink('../uploads/' . $res->upload_name)) {
                        echo "delete";
                    }
                } else {
                    "unable";
                }
            } else {
            }
        } else {
            echo "wrong";
        }
    }
}

if (isset($_POST['delete_out'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
    $insession = filter_var(trim($_POST['insession']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $insession]);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $hash = $result->password;
        if (password_verify($password, $hash)) {
            $param = [
                'out_id' => $id,
            ];
            $result = $db->query("DELETE FROM outgoing_file WHERE out_id = :out_id", $param);
            if ($result) {
                echo "delete";
            } else {
                "unable";
            }
        } else {
            echo "wrong";
        }
    }
}

if (isset($_POST['delete_in'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
    $insession = filter_var(trim($_POST['insession']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $insession]);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $hash = $result->password;
        if (password_verify($password, $hash)) {
            $param = [
                'in_id' => $id,
            ];
            $result = $db->query("DELETE FROM incoming_file WHERE in_id = :in_id", $param);
            if ($result) {
                echo "delete";
            } else {
                "unable";
            }
        } else {
            echo "wrong";
        }
    }
}




if (isset($_POST["deleteAdmin"])) {
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin_pass = filter_input(INPUT_POST, 'admin_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $users_id]);
    $admin = $stmt->fetch();
    $hash = $admin->password;
    if (password_verify($admin_pass, $hash)) {
        $stmt = $conn->prepare("DELETE FROM users WHERE users_id = :users_id");
        $result = $stmt->execute(['users_id' => $users_id]);
        if ($result) {
            echo "delete";
            session_destroy();
        }
    } else {
        echo "no";
    }
}
