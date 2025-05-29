<?php

$page_title = PAGE_TITLE . " | RESET PASSWORD";
if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] == 'administrator') {
        header('location:' . URL . 'admin');
    } else {
        header('location:' . URL);
    }
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
                            <form method="POST" id="reset_code" class="login">
                                <div class="mb-3">
                                    <h2>Forgot Password?</h2>
                                </div>
                                <p id="ferror_status"></p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="forgotEmail" id="forgotEmail" aria-describedby="emailHelp">
                                </div>

                                <input type="hidden" name="reset_code" value="1">
                                <div class="mb-3">
                                    <button type="submit" name="btn_forgot" id="btn_forgot" class="btn btn-re w-100">Get OTP</button>
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <label for="email" class="form-label">Back to login: <a href="<?= URL . 'login'; ?>">Login</a></label>

                                </div>

                                <p id="fcounter" hidden>0</p>
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
<script>
    let states = false;

    function toggle() {
        if (states) {
            document.getElementById("password").setAttribute("type", "password");
            states = false;
        } else {
            document.getElementById("password").setAttribute("type", "text")
            states = true;
        }
    }

    function myFunction(show) {
        show.classList.toggle("fa-eye-slash");
    }
</script>