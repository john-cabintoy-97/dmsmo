<?php

$page_title = PAGE_TITLE . " | RESET PASSWORD";
if (!isset($_COOKIE['remail'])) {
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
                            <form method="POST" id="forgot" class="login">
                                <div class="mb-3">
                                    <h2>Create New Password</h2>
                                </div>

                                <div class="mb-3 pass-con">
                                    <label for="pasword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="fpassword" id="fpassword">
                                    <span class="show-pass" onclick="togglec()">
                                        <i class="far fa-eye" onclick="myFunction(this)"></i>
                                    </span>
                                </div>
                                <div class="mb-3 pass-con">
                                    <label for="pasword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword">
                                    <span class="show-pass" onclick="togglek()">
                                        <i class="far fa-eye" onclick="myFunction(this)"></i>
                                    </span>
                                </div>
                                <input type="hidden" id="forgot" name="forgot" value="1">
                                <div class="mb-3">
                                    <button type="submit" name="btn_reset" id="btn_reset" class="btn btn-re w-100">Reset</button>
                                </div>

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
        <script>
            let statek = false;

            function togglec() {
                if (statek) {
                    document.getElementById("fpassword").setAttribute("type", "password");
                    statek = false;
                } else {
                    document.getElementById("fpassword").setAttribute("type", "text")
                    statek = true;
                }
            }

            function togglek() {
                if (statek) {
                    document.getElementById("cpassword").setAttribute("type", "password");
                    statek = false;
                } else {
                    document.getElementById("cpassword").setAttribute("type", "text")
                    statek = true;
                }
            }

            function myFunction(show) {
                show.classList.toggle("fa-eye-slash");
            }
        </script>

    </div>
</div>