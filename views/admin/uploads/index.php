<?php

$page_title = PAGE_TITLE . " | USERS";


$controller = new Admin_Model();
$fileList = $controller->getAllDocuments();

if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'administrator'  && $_SESSION['dmsmo_usertype'] != 'staff') {
        header('location:' . URL);
    }
} else {
    header('location:' . URL);
}
?>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=uploads">Documents files Management</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold">Documents files Management</h5>
                                <button class="btn btn-re" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="fa fa-plus-square"></i>&nbsp;Store new documents</button>
                            </div>
                        </h4>
                        <div class="table-responsive">
                            <table id="table4" class="table table-bordered" width="100%">
                                <thead class="thead-custom text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>File name</th>
                                        <th>File size</th>
                                        <th>File type</th>
                                        <th>Download</th>
                                        <th>Uploader</th>
                                        <th>User Type</th>
                                        <th>Created At</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>File type</th>
                                        <th></th>
                                        <th>Uploader</th>
                                        <th></th>
                                        <th>Created At</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($fileList as $lists) :
                                        $user = $controller->getUsersById($lists->users_id);
                                    ?>
                                        <?php if ($lists->status !== 'archived') : ?>
                                            <tr>
                                                <td><?= $counter++; ?></td>
                                                <td><?= strtoupper($lists->filename); ?></td>
                                                <td><?= $controller->convertBytes($lists->filesize); ?></td>
                                                <td><?= $lists->filetype; ?></td>
                                                <td><?= $lists->download; ?></td>
                                                <td><?= strtoupper($user->name); ?></td>
                                                <td><?= $user->user_type; ?></td>
                                                <td><?= $lists->timestamp; ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-evenly align-items-center">
                                                        <a href="<?= URL ?>download?id=<?= $controller->urlEncode($lists->do_id); ?>" class="btn btn-sm btn-info text-white mr-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download"><i class="fa fa-download"></i></a>
                                                        <?php if ($_SESSION['dmsmo_usertype'] != 'staff') : ?>
                                                            <button onclick="archiveFile(<?= $lists->do_id; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete File"><i class="fa fa-trash"></i></button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>