<?php

$page_title = PAGE_TITLE . " | RESET PASSWORD";
if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] == 'administrator') {
        header('location:' . URL . 'admin');
    } else {
        header('location:' . URL);
    }
}
?>

<?php
if (isset($_GET['p'])) {
    switch ($_GET['p']) {
        case 'otp':
            include_once 'otp/index.php';
            break;
        case 'verify':
            include_once 'verify/index.php';
            break;
        case 'password':
            include_once 'password/index.php';
            break;
        default:
            include_once '404/index.php';
            break;
    }
} else {
    include_once 'otp/index.php';
}

?>
