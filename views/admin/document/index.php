<?php
if (isset($controller)) {
    $dropdown_user =  $controller->getAllUsers();
}

?>
<div class="container-fluid">
    <form method="post" id="uploadModalForm">
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Recipients</label>
                        <select class="form-select 100vh" name="recipients[]" id="recipients" multiple required>
                            <?php foreach ($dropdown_user as $lists) : ?>
                                <option value="<?= $lists->users_id; ?>">
                                    <?= $lists->name . " - " . $lists->email; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 upload">
                        <label for="file" class="form-label">Select file to upload:</label>
                        <p>File Type:.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</p>
                        <input type="file" name="file" id="file" class="upload-hidden" accept=".docx,.doc,.pptx,.ppt,.xlsx,.xls,.pdf,.odt">

                    </div>
                </div>
                <div class="col-lg-12 d-flex flex-row justify-content-end">
                    <button type="submit" class="btn btn-re">Upload</button>

                </div>
            </div>
        </div>
    </form>
</div>