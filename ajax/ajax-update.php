<?php

session_start();
require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['update_user'])) {
        $name = filter_var(trim($_POST['ename']), FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var(trim($_POST['eemail']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['epassword']), FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_var(trim($_POST['eusertype']), FILTER_SANITIZE_SPECIAL_CHARS);
        $users_id = filter_var(trim($_POST['pass_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        if ($password == '') {
            $param = [
                'name' => trim($name),
                'email' => trim($email),
                'user_type' => $type,
                'users_id' => $users_id
            ];

            $result = $db->query("UPDATE users SET name = :name,email = :email,  user_type = :user_type WHERE users_id = :users_id", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            $param = [
                'name' => trim($name),
                'email' => trim($email),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'user_type' => $type,
                'users_id' => $users_id
            ];

            $result = $db->query("UPDATE users SET name = :name,email = :email, password = :password, user_type = :user_type WHERE users_id = :users_id", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        }
    }

    if (isset($_POST['update_name'])) {
        $name = filter_var(trim($_POST['profileName']), FILTER_SANITIZE_SPECIAL_CHARS);
        $profile_id = filter_var(trim($_POST['profile_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $param = [
            'name' => trim($name),
            'users_id' => $profile_id
        ];

        $result = $db->query("UPDATE users SET name = :name WHERE users_id = :users_id", $param);
        if ($result) {
            echo "ok";
            $_SESSION['dmsmo_name'] = $name;
        } else {
            echo "error";
        }
    }

    if (isset($_POST['update_email'])) {
        $profileEmail = filter_var(trim($_POST['profileEmail']), FILTER_SANITIZE_SPECIAL_CHARS);
        $profile_id = filter_var(trim($_POST['profile_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $param = [
            'email' => trim($profileEmail),
            'users_id' => $profile_id
        ];

        $result = $db->query("UPDATE users SET email = :email WHERE users_id = :users_id", $param);
        if ($result) {
            echo "ok";
            $_SESSION['dmsmo_email'] = $profileEmail;
        } else {
            echo "error";
        }
    }

    if (isset($_POST["change_pass"])) {
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $old_admin_pass = filter_input(INPUT_POST, 'old_admin_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_admin_pass = filter_input(INPUT_POST, 'new_admin_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
        $stmt->execute(['users_id' => $users_id]);
        $admin = $stmt->fetch();
        $hash = $admin->password;
        if (password_verify($old_admin_pass, $hash)) {
            $stmt = $conn->prepare("UPDATE users SET password = :password WHERE users_id  = :users_id ");
            $result = $stmt->execute(['password' => password_hash($new_admin_pass, PASSWORD_BCRYPT), 'users_id' => $users_id]);
            if ($result) {
                echo "pass_updated";
            }
        } else {
            echo "no";
        }
    }


    if (isset($_POST['block'])) {
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
                $result = $db->query("UPDATE users SET status = 'blocked' WHERE users_id = :users_id", $param);
                if ($result) {
                    echo "ok";
                } else {
                    "unable";
                }
            } else {
                echo "wrong";
            }
        }
    }

    if (isset($_POST['unblock'])) {
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
                $result = $db->query("UPDATE users SET status = 'unblocked' WHERE users_id = :users_id", $param);
                if ($result) {
                    echo "ok";
                } else {
                    "unable";
                }
            } else {
                echo "wrong";
            }
        }
    }
}
