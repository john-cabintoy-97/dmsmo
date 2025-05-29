<?php

$page_title = PAGE_TITLE . " | LOGIN";
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
        <div class="card o-hidden transparent border-0 my-5" style="background: inherit !important;margin-top:10px !important;">
            <div class="card-body  p-0">
                <div class="row p-0  mb-3">
                    <div class="col-2-lg col-md-4 col-sm-12 ">

                    </div>
                    <div class="col-6-lg col-md-4 col-sm-12">
                        <div class="d-flex justify-content-center">
                            <form method="POST" id="login" class="login">
                                <div class="mb-3">
                                    <h2>Login</h2>
                                </div>
                                <p id="error_status"></p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 pass-con">
                                    <label for="pasword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <span class="show-pass" onclick="toggle()">
                                        <i class="far fa-eye" onclick="myFunction(this)"></i>
                                    </span>
                                </div>

                                <input type="hidden" name="login" value="1">
                                <div class="mb-3">
                                    <button type="submit" name="btn_login" id="btn_login" class="btn btn-re w-100">Login</button>
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <label for="email" class="form-label">Login as: <a href="<?= URL . 'admin?p=login'; ?>">Management</a></label>
                                    <label for="email" class="form-label"><a href="<?= URL . 'forgot'; ?>">Forgot Password</a></label>
                                </div>

                                <p id="counter" hidden>0</p>
                            </form>
                        </div>
                    </div>
                    <div class="col-2-lg col-md-4 col-sm-12 ">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let statel = false;

    function toggle() {
        if (statel) {
            document.getElementById("password").setAttribute("type", "password");
            statel = false;
        } else {
            document.getElementById("password").setAttribute("type", "text")
            statel = true;
        }
    }

    function myFunction(show) {
        show.classList.toggle("fa-eye-slash");
    }
</script>