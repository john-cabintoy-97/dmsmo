<?php

$page_title = PAGE_TITLE . " | ARCHIVED";


$controller = new Admin_Model();
$userList = $controller->getAllUsers();
$fileList = $controller->getAllDocuments();
$outgoing_list = $controller->getAllOutgoing();
$incoming_list = $controller->getAllIncoming();

$InID = '';
if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'administrator' && $_SESSION['dmsmo_usertype'] != 'staff') {
        header('location:' . URL);
    }
    $InID = $_SESSION['dmsmo_users'];
} else {
    header('location:' . URL);
}
?>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=archive">Archive Management</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex mb-5 justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold">Archive Management</h5>

                            </div>
                        </h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="container1-tab" data-bs-toggle="tab" data-bs-target="#container1" type="button" role="tab" aria-controls="container1" aria-selected="true">Users Archived</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container2-tab" data-bs-toggle="tab" data-bs-target="#container2" type="button" role="tab" aria-controls="container2" aria-selected="false">Documents Archived</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container3-tab" data-bs-toggle="tab" data-bs-target="#container3" type="button" role="tab" aria-controls="container3" aria-selected="false">Incoming Archived</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container4-tab" data-bs-toggle="tab" data-bs-target="#container4" type="button" role="tab" aria-controls="container4" aria-selected="false">Outgoing Archived</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="container1" role="tabpanel" aria-labelledby="container1-tab">
                                <?php include_once 'table1.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="container2" role="tabpanel" aria-labelledby="container2-tab">
                                <?php include_once 'table2.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="container3" role="tabpanel" aria-labelledby="container3-tab">
                                <?php include_once 'table3.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="container4" role="tabpanel" aria-labelledby="container4-tab">
                                <?php include_once 'table4.php'; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>