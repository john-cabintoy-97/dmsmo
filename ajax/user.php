<?php
session_start();
require '../libs/model.php';
require '../libs/mailer.php';
$db = new Model();
$mailer = new Mailer();
    $conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['admin-login'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $user_type = filter_var(trim($_POST['user_type']), FILTER_SANITIZE_SPECIAL_CHARS);

        // print_r($_POST);
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(['email' => strtolower($email)]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();

            $hash = $result->password;
            $stored_user_type = $result->user_type;
            $stored_email = $result->email;
            $stored_user = $result->users_id;
            $stored_name = $result->name;
            $status = $result->status;

            if ($status !== 'archived') {
                if ($status == 'blocked') {
                    echo "block";
                } else {
                    if ($stored_user_type !== $user_type) {
                        echo "Invalid_user_type";
                    } else {
                        if (password_verify($password, $hash)) {

                            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                                $ip = $_SERVER["HTTP_CLIENT_IP"];
                            } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                            } else {
                                $ip = $_SERVER["REMOTE_ADDR"];
                            }

                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

                            $param = [
                                'ip' => $ip,
                                'host' => $host,
                                'users_id' => $stored_user,
                            ];
                            $result = $db->query("INSERT INTO system_log (ip, host, logged_in,users_id) VALUES (:ip, :host, NOW(), :users_id)", $param);

                            if ($result) {

                                $_SESSION['dmsmo_isLogin'] = true;
                                $_SESSION['dmsmo_users'] = $stored_user;
                                $_SESSION['dmsmo_usertype'] = $stored_user_type;
                                $_SESSION['dmsmo_email'] = $stored_email;
                                $_SESSION['dmsmo_name'] = $stored_name;

                                echo "Login_successful";
                            }
                        } else {
                            echo "Incorrect_password";
                        }
                    }
                }
            } else {
                echo "contact";
            }
        } else {
            echo "User_not_found";
        }
    }

    if (isset($_POST['login'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(['email' => strtolower($email)]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();

            $hash = $result->password;
            $stored_user_type = $result->user_type;
            $stored_email = $result->email;
            $stored_user = $result->users_id;
            $stored_name = $result->name;
            $status = $result->status;

            if ($status !== 'archived') {
                if ($status == 'blocked') {
                    echo "block";
                } else {

                    if ($stored_user_type !== 'employee') {
                        echo "User_not_found";
                    } else {
                        if (password_verify($password, $hash)) {

                            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                                $ip = $_SERVER["HTTP_CLIENT_IP"];
                            } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                            } else {
                                $ip = $_SERVER["REMOTE_ADDR"];
                            }

                            $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

                            $param = [
                                'ip' => $ip,
                                'host' => $host,
                                'users_id' => $stored_user,
                            ];
                            $result = $db->query("INSERT INTO system_log (ip, host, logged_in,users_id) VALUES (:ip, :host, NOW(), :users_id)", $param);
                            //  print_r($param);
                            if ($result) {
                                $_SESSION['dmsmo_isLogin'] = true;
                                $_SESSION['dmsmo_users'] = $stored_user;
                                $_SESSION['dmsmo_usertype'] = $stored_user_type;
                                $_SESSION['dmsmo_email'] = $stored_email;
                                $_SESSION['dmsmo_name'] = $stored_name;

                                echo "Login_successful";
                            }
                        } else {
                            echo "Incorrect_password";
                        }
                    }
                }
            } else {
                echo "contact";
            }
        } else {
            echo "User_not_found";
        }
    }

    if (isset($_POST['register'])) {
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_var(trim($_POST['usertype']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name OR  email = :email");
        $stmt->execute(['name' => $name, 'email' => $email]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'name' => strtolower(trim($name)),
                'email' => strtolower(trim($email)),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'user_type' => $type
            ];

            $result = $db->query("INSERT INTO users (`name`, `email`, `password`, `user_type`) VALUES (:name, :email, :password, :user_type)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['reset_code'])) {
        $email = filter_var(trim($_POST['forgotEmail']), FILTER_SANITIZE_SPECIAL_CHARS);
        $code = filter_var(trim($_POST['forgotcode']), FILTER_SANITIZE_SPECIAL_CHARS);
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(['email' => strtolower($email)]);
        if ($stmt->rowCount() > 0) {
            $recipient = $email;
            $subject = "DMSMO | Reset Code";
            $html = $mailer->emailResetTemplate($code);

            $msgWithNoHtml = '';

            $mailer->sendEmail(
                $recipient,
                $subject,
                $html,
                $msgWithNoHtml
            );
            $_SESSION['email'] = $email;
        } else {
            echo "no";
        }
    }

    if (isset($_POST['resend'])) {
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $recipient = $email;
        $subject = "DMSMO | Reset Code";
        $html = $mailer->emailResetTemplate($code);
        $msgWithNoHtml = '';

        $mailer->sendEmail(
            $recipient,
            $subject,
            $html,
            $msgWithNoHtml
        );
    }

    if (isset($_POST['reset_verify'])) {
        $code = filter_input(INPUT_POST, 'forgotverifyotp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_COOKIE['rcode'])) {
            if ($code != $_COOKIE['rcode']) {
                echo "wrong";
            } else {
                echo "ok";
            }
        } else {
            echo "expired";
        }
    }

    if (isset($_POST['forgot'])) {
        if (isset($_SESSION['email'])) {
            $password = filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = $_SESSION['email'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                $param = [
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'email' => $email,
                ];

                $result = $db->query("UPDATE users SET password = :password WHERE email = :email", $param);
                if ($result) {
                    echo "ok";
                    unset($_SESSION['email']);
                } else {
                    echo "err";
                }
            }
        } else {
            echo "no";
        }
    }
}
