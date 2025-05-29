<?php


$controller = new Admin_Model();
$model = new Model();

if (isset($_GET['id'])) {

    $id = '';

    if (is_numeric($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $controller->urlDecode($_GET['id']);
    }

    $res = $controller->getDocuById($id);
    $file = $res->upload_name;
    $download = $res->download;
    $path = ' ../../uploads/' . $file;

    if (file_exists($path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));

        ob_clean();
        flush();
        readfile($path);

        $count = $download + 1;
        $param = [
            'download' => $count,
            'do_id' => $id
        ];
        $model->query("UPDATE file_documents SET download = :download WHERE do_id = :do_id", $param);
        header('location:' . URL . 'admin?p=uploads');
        exit;
    } else {
        header('location:' . URL . 'admin?p=uploads');
        exit;
    }
} else {
    header('location:' . URL);
    exit;
}
