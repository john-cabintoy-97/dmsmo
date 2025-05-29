<div class="table-responsive">
    <table id="other_table" class="table table-bordered" width="100%">
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
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php $counter = 1;

            foreach ($userList as $lists) : ?>
                <?php if ($lists->user_type !== 'administrator' && $lists->status == 'archived') : ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= strtoupper($lists->name); ?></td>
                        <td><?= $lists->email; ?></td>
                        <td><?= $lists->user_type; ?></td>
                        <td><?= $lists->created_at; ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly align-items-center">
                                <button onclick="restoreEmployee(<?= $lists->users_id; ?>)" class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore Employee"><i class="fas fa-undo"></i></button>
                                <button onclick="deleteEmployee(<?= $lists->users_id; ?>,<?= $_SESSION['dmsmo_users']; ?>)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Employee"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>