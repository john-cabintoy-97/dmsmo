<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !isset($page_title) ? PAGE_TITLE : $page_title; ?></title>
    <?php include('./config/init.php'); ?>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <div id="main-wrapper">
        <!-- header page -->
        <?php include('header/index.php'); ?>
        <!-- content page -->
        <?= $children; ?>
        <!-- footer page -->
        <?php include('footer/index.php'); ?>
        <?php include('./modal/modal.php'); ?>
        <?php include('./config/script.php'); ?>
    </div>
</body>

</html>