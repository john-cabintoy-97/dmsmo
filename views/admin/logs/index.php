<?php

$page_title = PAGE_TITLE . " | ACCOUNT LOG";


$controller = new Admin_Model();
$logsList = $controller->getAllLogs();

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
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=logs">Account Logs</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold">Account Logs</h5>
                            </div>
                        </h4>
                        <div class="table-responsive">
                            <table id="common_table" class="table table-bordered" width="100%">
                                <thead class="thead-custom text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Ip</th>
                                        <th>Host</th>
                                        <th>Logged In</th>
                                        <th>Logged Out</th>
                                        <th>Users</th>
                                        <th>Users Type</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Users</th>
                                        <th>Users Type</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($logsList as $lists) :

                                        $data = $controller->getUsersById($lists->users_id);
                                    ?>
                                        <?php if ($data->user_type === $_SESSION['dmsmo_usertype']) : ?>
                                            <tr>
                                                <td><?= $counter++; ?></td>
                                                <td><?= $lists->ip; ?></td>
                                                <td><?= $lists->host; ?></td>
                                                <td><?= $lists->logged_in; ?></td>
                                                <td><?= $lists->logged_out; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td><?= $data->user_type; ?></td>
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