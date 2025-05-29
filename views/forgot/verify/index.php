<?php

$page_title = PAGE_TITLE . " | RESET PASSWORD";
if (!isset($_COOKIE['remail']) ) {
    header('location:' . URL);
}
?>

<div class="wrapper">
    <div class="container-fluid">

        <div class="row p-0  mb-3">
            <div class="col-2-lg col-md-4 col-sm-12 ">

            </div>
            <div class="col-6-lg col-md-4 col-sm-12">
                <div class="card o-hidden transparent border-0 my-5" style="background: inherit !important;margin-top:75px !important;">
                    <div class="card-body  p-0">
                        <div class="d-flex justify-content-center">
                            <form method="POST" id="reset_verify" class="login">
                                <div class="mb-3">
                                    <h2>Verify OTP</h2>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">We have sent code to your email: <strong><?= $_COOKIE['remail']; ?></strong></label>
                                    <p id="ferror_status"></p>
                                    <input type="number" class="form-control" name="forgotverifyotp" id="forgotverifyotp" style="text-align: center;" autocomplete="off" aria-describedby="emailHelp">
                                </div>
                                <input type="hidden" id="reset_verify" name="reset_verify" value="1">
                                <div class="mb-3">
                                    <button type="submit" name="btn_verify" id="btn_verify" class="btn btn-re w-100">Verify</button>
                                </div>
                                <div class="d-flex" id="rresend-timer"></div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <label for="email" class="form-label">Back to: <a href="<?= URL . 'forgot'; ?>">Forgot Page</a></label>

                                </div>
                              
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2-lg col-md-4 col-sm-12 ">

            </div>
        </div>

    </div>
</div>