<?php
if (isset($controller)) {
    $dropdown_user =  $controller->getAllUsers();
    $dropdown_file =  $controller->getAllDocuments();
    $adminData = $controller->getProfileById("SELECT * FROM users WHERE users_id = :users_id", $_SESSION["dmsmo_users"]);
}
?>

<style>
    .upload {
        width: 100%;
    }

    .upload label {
        font-weight: bold !important;
    }

    .upload p {
        font-size: 0.8rem;
        color: #14261C !important;
    }

    .upload input[type='file'] {
        font-size: 1rem;
        padding: 5px;
        border: none;
    }

    .upload select {
        border: 1px solid #CED4DA !important;
        outline: none !important;
        padding: 5px !important;
    }

    .text {
        width: 100px;
        background-color: red !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<!-- UPLOAD-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="exampleModalLabel">STORE NEW DOCUMENTS</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card">
                        <!-- post -->
                        <form method="post" id="uploadModalForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"><strong>File name</strong></label>
                                            <input type="text" class="form-control" name="filename" id="filename" required>
                                        </div>
                                        <div class="mb-3 mt-3">

                                            <label for="file" class="form-label"><strong>Select file to upload:</strong></label>
                                            <p>File Type:.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</p>
                                            <input type="file" name="ufile" id="ufile" class="form-control" accept=".docx,.doc,.pptx,.ppt,.xlsx,.xls,.pdf,.odt" required>
                                            <div class="progress mt-3">
                                                <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 0%">
                                                    0%
                                                </div>
                                            </div>

                                        </div>

                                        <input type="hidden" name="upload" value="1">
                                        <input type="hidden" name="pass_id">
                                        <div class="mb-3">
                                            <button type="submit" name="upload_btn" class="btn btn-re w-100">Upload</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>

<!-- USERS ADD-->
<div class="modal fade" id="insertUsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="exampleModalLabel">ADD USER EMPLOYEE</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card">
                        <!-- post -->
                        <form method="post" id="userModalForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 mt-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pasword" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="pasword">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">User Type</label>
                                            <select class="form-select" id="usertype" name="usertype" aria-label="User Type">
                                                <option value="employee">Employee</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="register" value="1">
                                        <input type="hidden" name="pass_id">
                                        <div class="mb-3">
                                            <button type="submit" name="reg_btn" class="btn btn-re w-100">Register</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<!-- USERS EDIT-->
<div class="modal fade" id="editUsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="exampleModalLabel">UPDATE USER EMPLOYEE</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card">
                        <!-- post -->
                        <form method="post" id="userEditModalForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 mt-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="ename" id="ename">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="eemail" id="eemail" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pasword" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="epassword" id="epasword">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">User Type</label>
                                            <select class="form-select" id="eusertype" name="eusertype" aria-label="User Type">
                                                <option value="employee">Employee</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="update_user" value="1">
                                        <input type="hidden" name="pass_id">
                                        <div class="mb-3">
                                            <button type="submit" name="update_users_btn" class="btn btn-re w-100">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<!-- SHARE OUTGOING-->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="exampleModalLabel">SHARE DOCUMENTS</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card upload">
                        <form method="post" id="shareModalForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Control No.</label>
                                            <input type="text" class="form-control" name="cno" id="cno" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Sending Office</label>
                                            <input type="text" class="form-control" name="so" id="so" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Receiving Office</label>
                                            <input type="text" class="form-control" name="ro" id="ro" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Particulare</label>
                                            <textarea class="form-control" name="pl" id="pl" cols="30" rows="2" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Remarks</label>
                                            <textarea class="form-control" name="rm" id="rm" cols="30" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Recipients</label>

                                                    <select class="form-select" name="recipients[]" id="recipients" multiple required>
                                                        <?php foreach ($dropdown_user as $lists) : ?>
                                                            <?php if ($lists->user_type != 'administrator' && $lists->user_type != 'staff'  && $lists->status !== 'archived') : ?>
                                                                <option value="<?= $lists->users_id . "-" . $lists->email;  ?>">
                                                                    <?= strtoupper($lists->name)  ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Select the documents you want to share.</label>

                                                    <select class="form-select" name="file" id="file" required>
                                                        <?php foreach ($dropdown_file as $lists) : ?>
                                                            <?php if ($lists->status !== 'archived') : ?>
                                                                <option value="<?= $lists->do_id; ?>">
                                                                    <?= strtoupper($lists->filename) . '.' .  strtolower($lists->filetype) ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <input type="hidden" name="outgoing_upload" value="1">
                                            <div class="col-lg-12 d-flex flex-row justify-content-end">
                                                <button type="submit" name="share_btn" class="btn btn-re w-100">Share Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<!-- SHARE INCOMING-->
<div class="modal fade" id="infileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="exampleModalLabel">SHARE DOCUMENTS</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card upload">
                        <form method="post" id="inshareModalForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Control No.</label>
                                            <input type="text" class="form-control" name="icno" id="icno" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Particulare</label>
                                            <textarea class="form-control" name="ipl" id="ipl" cols="30" rows="2" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Directions</label>
                                            <textarea class="form-control" name="idr" id="idr" cols="30" rows="2" required></textarea>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Remarks</label>
                                                    <textarea class="form-control" name="irm" id="irm" cols="30" rows="4" required></textarea>
                                                </div>
                                                <div class="mb-3" hidden>
                                                    <label for="name" class="form-label">Recipients</label>

                                                    <select class="form-select" name="irecipients" id="irecipients" required>
                                                        <?php foreach ($dropdown_user as $lists) : ?>
                                                            <?php if ($lists->user_type != 'employee' && $lists->user_type != 'staff'  && $lists->status !== 'archived') : ?>
                                                                <option value="<?= $lists->users_id; ?>">
                                                                    <?= strtoupper($lists->name)  ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Select the documents you want to share.</label>

                                                    <select class="form-select" name="ifile" id="ifile" required>
                                                        <?php foreach ($dropdown_file as $lists) : ?>
                                                            <?php if ($lists->users_id === $_SESSION['dmsmo_users'] && $lists->status !== 'archived') : ?>
                                                                <option value="<?= $lists->do_id; ?>">
                                                                    <?= strtoupper($lists->filename) . '.' .  strtolower($lists->filetype) ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <input type="hidden" name="incoming_upload" value="1">
                                            <div class="col-lg-12 d-flex flex-row justify-content-end">
                                                <button type="submit" name="share_btn" class="btn btn-re w-100">Share Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<!-- VIEW INCOMING-->
<div class="modal fade" id="viewInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="viewInLabel"></p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card view">
                        <form method="post" id="IncomingViewForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Control No.</label>
                                            <input type="text" class="form-control" name="icnov" id="icnov" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Particulare</label>
                                            <textarea class="form-control" name="iplv" id="iplv" cols="30" rows="4" readonly></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Directions</label>
                                            <textarea class="form-control" name="idrv" id="idrv" cols="30" rows="2" readonly></textarea>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Remarks</label>
                                                    <textarea class="form-control" name="irmv" id="irmv" cols="30" rows="6" readonly></textarea>
                                                </div>

                                                <div class="col-lg-12">

                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Document Name</label>
                                                        <input type="text" class="form-control" name="idcv" id="idcv" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ido_id" id="ido_id">
                                            <input type="hidden" name="download_modal" value="1">
                                            <div class="col-lg-12 d-flex flex-row justify-content-end">
                                                <button type="submit" name="share_btn" class="btn btn-re w-100">Download</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>

<!-- VIEW OUTGOING-->
<div class="modal fade" id="viewOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title" id="viewOutLabel"></p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="card view">
                        <form method="post" id="outgoingViewForm">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Control No.</label>
                                            <input type="text" class="form-control" name="cnov" id="cnov" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Sending Office</label>
                                            <input type="text" class="form-control" name="sov" id="sov" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Receiving Office</label>
                                            <input type="text" class="form-control" name="rov" id="rov" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Particulare</label>
                                            <textarea class="form-control" name="plv" id="plv" cols="30" rows="4" readonly></textarea>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Remarks</label>
                                                    <textarea class="form-control" name="rmv" id="rmv" cols="30" rows="6" readonly></textarea>
                                                </div>

                                                <div class="col-lg-12">

                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Document Name</label>
                                                        <input type="text" class="form-control" name="dcv" id="dcv" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="do_id" id="do_id">
                                            <input type="hidden" name="download_modal_in" value="1">
                                            <div class="col-lg-12 d-flex flex-row justify-content-end">
                                                <button type="submit" name="share_btn" class="btn btn-re w-100">Download</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>

<!-- PROFILE -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-custom-success text-white">
                <p class="modal-title">Profile</p>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-0">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 prof-con">
                                        <form method="post" id="changeName">
                                            <div class="form-group m-0 pb-0">
                                                <label>NAME</label>
                                                <input type="text" class="form-control" name="profileName" id="profileName" value="<?= $adminData->name; ?>" disabled aria-describedby="button-addon2">
                                                <input type="hidden" name="profile_id" value="<?= $adminData->users_id; ?>">
                                                <input type="hidden" name="update_name">
                                                <span class="show-pass">
                                                    <button class="btn  mx-1 b-0" type="button" style="display:block;" id="profileNameEdit"><i class="fas fa-edit"></i></button>
                                                    <button class="btn  mx-1 b-0" type="submit" style="display:none;" id="profileNameSave"><i class="fas fa-save"></i></button>
                                                </span>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="mb-3 prof-con">
                                        <form method="post" id="changeEmail">
                                            <div class="form-group m-0 pb-0">
                                                <label>Email</label>
                                                <input type="eamil" class="form-control" name="profileEmail" id="profileEmail" value="<?= $adminData->email; ?>" disabled required aria-describedby="button-addon2" required>
                                                <input type="hidden" name="profile_id" value="<?= $adminData->users_id; ?>">
                                                <input type="hidden" name="update_email">
                                                <span class="show-pass">
                                                    <button class="btn  mx-1 b-0" type="button" style="display:block;" id="profileEmailEdit"><i class="fas fa-edit"></i></button>
                                                    <button class="btn  mx-1 b-0" type="submit" style="display:none;" id="profileEmailSave"><i class="fas fa-save"></i></button>
                                                </span>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-col-12">
                                    <form method="post" id="changepassAdminform">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="md-form mb-3">
                                                    <label>Enter old password</label>
                                                    <input type="password" name="old_admin_pass" class="form-control" autocomplete="off" required>
                                                </div>

                                            </div>
                                            <div class="col-sm-12">

                                                <div class="mb-3 pass-con">
                                                    <label for="pasword" class="form-label">Enter new password</label>
                                                    <input type="password" class="form-control" name="new_admin_pass" id="password">
                                                    <span class="show-pass" onclick="toggle()">
                                                        <i class="far fa-eye" onclick="myFunction(this)"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="pass_id" value="<?= $adminData->users_id; ?>">

                                                <button type="submit" name="change_pass_btn" class="btn btn-success mb-2 text-white form-control bg-admin-custom" disabled>Change
                                                    Password</button>
                                                <?php if ($_SESSION['dmsmo_usertype'] == 'administrator') : ?>
                                                    <button type="button" onclick="deleteAdmin(<?= $adminData->users_id; ?>)" class="btn bg-danger text-white form-control">DELETE ACCOUNT</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="adminProfileDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background:red !important;">
                <p class="modal-title" id="exampleModalLabel"><strong><i class="fa fa-warning"></i>&nbsp; DELETE ACCOUNT</strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <div id="accordion">
                    <div class="card">
                        <!-- post -->
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-col-12">
                                    <form method="post" id="changepassAdminformDelete">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p><strong>Are you sure you wish to delete this admin?</strong> <br><br>This admin will now be deleted and logged off by all users, but once it's reloaded, the new setup admin in "config/system.php" will replace the one deleted, and it will be the new administrator.</p>
                                                <hr>
                                                <div class="md-form mb-3">
                                                    <label>Enter password</label>
                                                    <input type="password" name="admin_pass" class="form-control" autocomplete="off" required>
                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="pass_id">
                                                <input type="hidden" name="deleteAdmin">
                                                <button type="submit" name="change_pass_btn" class="btn btn-danger mb-0 text-white form-control bg-admin-custom" disabled>
                                                    Delete</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text")
            state = true;
        }
    }

    function myFunction(show) {
        show.classList.toggle("fa-eye-slash");
    }

    let profileNameEdit = document.getElementById("profileNameEdit");
    if (profileNameEdit) {
        profileNameEdit.addEventListener("click", () => {
            document.getElementById("profileName").disabled = false;
            document.getElementById("profileNameSave").style = 'display:block';
            document.getElementById("profileNameEdit").style = 'display:none';
            profileNameEdit.disabled = true;
        });
    }

    let profileEmailEdit = document.getElementById("profileEmailEdit");
    if (profileEmailEdit) {
        profileEmailEdit.addEventListener("click", () => {
            document.getElementById("profileEmail").disabled = false;
            document.getElementById("profileEmailSave").style = 'display:block';
            document.getElementById("profileEmailEdit").style = 'display:none';
            profileEmailEdit.disabled = true;
        });
    }
</script>