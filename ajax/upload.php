<?php

session_start();
require '../libs/model.php';
$db = new Model();
$conn = $db->connection();


if (isset($_POST['upload'])) {

    $filename = filter_var(trim($_POST['filename']), FILTER_SANITIZE_SPECIAL_CHARS);

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $fileName = explode('.', $fileName);
    $fileType = strtoupper(end($fileName));


    $stmt = $conn->prepare("SELECT * FROM file_documents WHERE filename = :filename");
    $stmt->execute(['filename' => $filename]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (count($result) <= 0) {

        if ($fileSize < 5000000) {

            $filenamec = str_replace(' ', '_', $filename);
            $ext = strtolower(end($fileName));
            $unique = date('YmdHis');
            $fileNameNew = strtolower($filenamec) . '_' . $unique . '.' . $ext;
            $fileDestination = '../uploads/' . $fileNameNew;

            $param = [
                'filename' => trim($filename),
                'filesize' => trim($fileSize),
                'filetype' =>  trim($fileType),
                'upload_name' => trim($fileNameNew),
                'download' => 0,
                'users_id' => $_SESSION['dmsmo_users']
            ];

            $result = $db->query("INSERT INTO file_documents (`filename`, `filesize`, `filetype`, `upload_name`, `download`, `users_id`) VALUES (:filename, :filesize, :filetype, :upload_name, :download, :users_id)", $param);
            if ($result) {
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "large";
        }
    } else {
        echo "exist";
    }
}

