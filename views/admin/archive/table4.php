<div class="table-responsive">
    <table id="table4" class="table table-bordered" width="100%">
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
                <?php if ($lists->status === 'archived') : ?>
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
                                <button onclick="restoreOut('<?= $lists->out_id; ?>')" class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore Outgoing"><i class="fas fa-undo"></i></button>
                                <button onclick="deleteOut(<?= $lists->out_id; ?>,<?= $_SESSION['dmsmo_users']; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Outgoing"><i class="fa fa-trash"></i></button>

                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>