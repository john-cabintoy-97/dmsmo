<?php

$page_title = PAGE_TITLE . " | MEMORANDUM";

$outgoing_list = $controller->getAllOutgoing();
$incoming_list = $controller->getAllIncoming();

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
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=memos">Memorandums</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold">Memorandums</h5>
                                <div class="d-flex gap-3">
                                    <button class="btn btn-re" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="fa fa-plus-square"></i>&nbsp;UPLOAD</button>
                                    <button class="btn btn-re" data-bs-toggle="modal" data-bs-target="#fileModal"><i class="fa fa-plus-square"></i>&nbsp;SHARE DOCUMENTS</button>
                                </div>
                            </div>
                        </h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="container1-tab" data-bs-toggle="tab" data-bs-target="#container1" type="button" role="tab" aria-controls="container1" aria-selected="true">Incoming Memo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container2-tab" data-bs-toggle="tab" data-bs-target="#container2" type="button" role="tab" aria-controls="container2" aria-selected="false">Outgoing Memo</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="container1" role="tabpanel" aria-labelledby="container1-tab">
                                <div class="table-responsive">
                                    <table id="table3" class="table table-bordered" width="100%">
                                        <thead class="thead-custom text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>CONTROL NO.</th>
                                                <th>FILENAME</th>
                                                <th>DOWNLOADS</th>
                                                <th>UPLOADER</th>
                                                <th>RECEVIER</th>
                                                <th>CREATED AT</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>CONTROL NO.</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>RECEVIER</th>
                                                <th>CREATED AT</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $counter = 1;

                                            foreach ($incoming_list as $lists) :
                                                $getFile = $controller->getDocuById($lists->do_id);
                                                $getUser = $controller->getUsersById($lists->users_id);
                                                $getUploader = $controller->getUsersById($lists->shared_by);

                                            ?>
                                                <?php if ($lists->status !== 'archived') : ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= strtoupper($lists->control_no); ?></td>
                                                        <td><?= strtoupper($getFile->filename) . '.' . strtolower($getFile->filetype) . ' / ' . $controller->convertBytes($getFile->filesize); ?></td>
                                                        <td><?= $getFile->download; ?></td>
                                                        <td><?= strtoupper($getUploader->name); ?></td>
                                                        <td><?= strtoupper($getUser->name); ?></td>
                                                        <td><?= $lists->timestamp; ?></td>

                                                        <td>
                                                            <div class="d-flex justify-content-evenly align-items-center">
                                                                <button onclick="viewIncomingMemo(<?= $lists->in_id; ?>)" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Memo"><i class="fa fa-eye"></i></button>
                                                                <button onclick="archiveInMemo(<?= $lists->in_id; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Memo"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="container2" role="tabpanel" aria-labelledby="container2-tab">
                                <div class="table-responsive">
                                    <table id="other_table" class="table table-bordered" width="100%">
                                        <thead class="thead-custom text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>CONTROL NO.</th>
                                                <th>FILENAME</th>
                                                <th>DOWNLOADS</th>
                                                <th>UPLOADER</th>
                                                <th>RECEVIER</th>
                                                <th>CREATED AT</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>CONTROL NO.</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>RECEVIER</th>
                                                <th>CREATED AT</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $counter = 1;

                                            foreach ($outgoing_list as $lists) :
                                                $getFile = $controller->getDocuById($lists->do_id);
                                                $getUser = $controller->getUsersById($lists->users_id);
                                                $getUploader = $controller->getUsersById($lists->shared_by);

                                            ?>
                                                <?php if ($lists->status !== 'archived') : ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= strtoupper($lists->control_no); ?></td>
                                                        <td><?= strtoupper($getFile->filename) . '.' . strtolower($getFile->filetype) . ' / ' . $controller->convertBytes($getFile->filesize); ?></td>
                                                        <td><?= $getFile->download; ?></td>
                                                        <td><?= strtoupper($getUploader->name); ?></td>
                                                        <td><?= strtoupper($getUser->name); ?></td>
                                                        <td><?= $lists->timestamp; ?></td>

                                                        <td>
                                                            <div class="d-flex justify-content-evenly align-items-center">
                                                                <button onclick="viewOutgoingMemo(<?= $lists->out_id; ?>)" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Memo"><i class="fa fa-eye"></i></button>
                                                                <button onclick="archiveOutMemo(<?= $lists->out_id; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Memo"><i class="fa fa-trash"></i></button>
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
    </div>

</div>