<?php

$page_title = PAGE_TITLE . " | DASHBOARD";

if (isset($_SESSION['dmsmo_isLogin'])) {
    // if ($_SESSION['dmsmo_usertype'] != 'administrator') {
    //     header('location:' . URL);
    // }
} else {
    // header('location:' . URL);
}
?>


<div class="container-fluid">
    <h1>Dashboard</h1>
</div>