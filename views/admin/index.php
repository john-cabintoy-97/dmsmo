<?php

$controller = new Admin_Model();

if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'dmsmo_administrator' || $_SESSION['dmsmo_usertype'] === 'staff') {
        // header('location:' . URL);
    }
} else {
    //header('location:' . URL);
}


?>

<div class="wrapper">
    <?php
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'memos':
                include_once 'memos/index.php';
                break;
            case 'uploads':
                include_once 'uploads/index.php';
                break;
            case 'archive':
                include_once 'archive/index.php';
                break;
            case 'users':
                include_once 'users/index.php';
                break;
            case 'logs':
                include_once 'logs/index.php';
                break;
            case 'report':
                include_once 'report/index.php';
                break;
            case 'account':
                include_once 'account/index.php';
                break;
            case 'syslog':
                include_once 'syslog/index.php';
                break;
            case 'login':
                include_once 'login/index.php';
                break;
            default:
                include_once '404/index.php';
                break;
        }
    } else {
        include_once 'dashboard/index.php';
    }

    ?>
</div>