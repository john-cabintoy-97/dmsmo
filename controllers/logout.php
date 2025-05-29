<?php

class Logout extends Controller
{
    private $app;

    function __construct()
    {
        $this->app = new Model();
        parent::__construct();
    }

    function id($arg = false)
    {
        if (!empty($arg)) {
            if (isset($_SESSION['dmsmo_users'])) {
                if ($_SESSION['dmsmo_users'] == $arg) {

                    $param = [
                        'users_id' => $_SESSION['dmsmo_users'],
                    ];
                    $result = $this->app->query("UPDATE system_log SET logged_out = NOW() WHERE users_id = :users_id OR logged_in LIKE CONCAT(NOW(), '%')", $param);

                    if ($result) {
                        unset($_SESSION['dmsmo_isLogin']);
                        unset($_SESSION['dmsmo_usertype']);
                        unset($_SESSION['dmsmo_email']);
                        unset($_SESSION['dmsmo_users']);
                        unset($_SESSION['dmsmo_name']);

                        header('location:' . URL . 'login');
                    }
                }
            } else {
                $this->view->render('404/index');
            }
        } else {
            $this->view->render('404/index');
        }
    }

    function index()
    {
        $this->view->render('404/index');
    }
}
