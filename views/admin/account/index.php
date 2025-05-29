<?php

$page_title = PAGE_TITLE . " | PROFILE";

if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'administrator' && $_SESSION['dmsmo_usertype'] != 'staff') {
        header('location:' . URL);
    }
} else {
    header('location:' . URL);
}
?>


<div class="container-fluid">
    <h1>Profile</h1>
</div>