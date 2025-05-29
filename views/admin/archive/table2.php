<div class="table-responsive">
    <table id="table" class="table table-bordered" width="100%">
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
                <th>User Type</th>
                <th>Created At</th>

                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $counter = 1;

            foreach ($fileList as $lists) :
                $user = $controller->getUsersById($lists->users_id);
            ?>
                <?php if ($lists->status === 'archived') : ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= strtoupper($lists->filename); ?></td>
                        <td><?= $controller->convertBytes($lists->filesize); ?></td>
                        <td><?= $lists->filetype; ?></td>
                        <td><?= $lists->download; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->user_type; ?></td>
                        <td><?= $lists->timestamp; ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly align-items-center">
                                <button onclick="restoreFile('<?= $lists->do_id; ?>')" class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore File"><i class="fas fa-undo"></i></button>
                                <button onclick="deleteFile(<?= $lists->do_id; ?>,<?= $_SESSION['dmsmo_users']; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete File"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>