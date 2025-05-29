<?php


require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if (isset($_POST['download_modal'])) {
    $do_id = filter_var(trim($_POST['ido_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    echo $do_id;
}

if (isset($_POST['download_modal_in'])) {
    $do_id = filter_var(trim($_POST['do_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    echo $do_id;
}
