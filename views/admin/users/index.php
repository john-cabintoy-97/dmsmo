<?php

$page_title = PAGE_TITLE . " | USERS";


$controller = new Admin_Model();
$userList = $controller->getAllUsers();

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
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=users">Users Management</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold">Users Management</h5>
                                <button class="btn btn-re" data-bs-toggle="modal" data-bs-target="#insertUsertModal"><i class="fa fa-plus-square"></i>&nbsp;Add new users</button>
                            </div>
                        </h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="container1-tab" data-bs-toggle="tab" data-bs-target="#container1" type="button" role="tab" aria-controls="container1" aria-selected="true">Users</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container2-tab" data-bs-toggle="tab" data-bs-target="#container2" type="button" role="tab" aria-controls="container2" aria-selected="false">Blocked</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="container1" role="tabpanel" aria-labelledby="container1-tab">
                                <div class="table-responsive">
                                    <table id="table3" class="table table-bordered" width="100%">
                                        <thead class="thead-custom text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Created At</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th></th>
                                                <th>User Type</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $counter = 1;

                                            foreach ($userList as $lists) : ?>
                                                <?php if ($lists->user_type !== 'administrator' && $lists->status !== 'archived') : ?>
                                                    <?php if ($lists->status != 'blocked') : ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= strtoupper($lists->name); ?></td>
                                                            <td><?= $lists->email; ?></td>
                                                            <td><?= $lists->user_type; ?></td>
                                                            <td><?= $lists->created_at; ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-evenly align-items-center">
                                                                    <button onclick="blockEmployee(<?= $lists->users_id; ?>,<?= $_SESSION['dmsmo_users']; ?>)" class="btn btn-sm btn-dark text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Blocked"><i class="fas fa-ban"></i></button>
                                                                    <button onclick="updateEmployee('<?= $lists->users_id; ?>')" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Student"><i class="fas fa-edit"></i></button>
                                                                    <button onclick="archiveEmployee(<?= $lists->users_id; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Student"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="container2" role="tabpanel" aria-labelledby="container2-tab">
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered" width="100%">
                                        <thead class="thead-custom text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
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
                                                <th>x</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $counter = 1;

                                            foreach ($userList as $lists) : ?>
                                                <?php if ($lists->user_type !== 'administrator' && $lists->status !== 'archived') : ?>
                                                    <?php if ($lists->status === 'blocked') : ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= strtoupper($lists->name); ?></td>
                                                            <td><?= $lists->email; ?></td>
                                                            <td><?= $lists->user_type; ?></td>
                                                            <td><?= $lists->created_at; ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-evenly align-items-center">
                                                                    <button onclick="unblockEmployee(<?= $lists->users_id; ?>,<?= $_SESSION['dmsmo_users']; ?>)" class="btn btn-sm btn-white text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unblocked"><i class="fas fa-ban"></i></button>
                                                                    <button onclick="updateEmployee('<?= $lists->users_id; ?>')" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Student"><i class="fas fa-edit"></i></button>
                                                                    <button onclick="archiveEmployee(<?= $lists->users_id; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete User"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
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
    </div>

</div>