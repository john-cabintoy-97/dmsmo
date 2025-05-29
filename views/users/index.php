<?php

$controller = new Admin_Model();

if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'employee') {
        header('location:' . URL);
    }
} else {
    header('location:' . URL);
}


?>

<div class="wrapper">
    <?php
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'memos':
                include_once 'memos/index.php';
                break;
            case 'account':
                include_once 'account/index.php';
                break;
            case 'syslog':
                include_once 'syslog/index.php';
                break;
            default:
                include_once '404/index.php';
                break;
        }
    } else {
        include_once 'memos/index.php';
    }

    ?>
</div>