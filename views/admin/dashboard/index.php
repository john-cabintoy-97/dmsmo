<?php

$page_title = PAGE_TITLE . " | DASHBOARD";

$userC = $controller->countUser();
$fileC = $controller->countFile();
$archivedC = $controller->countArchived();
$sharedC = $controller->countShared();


if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] != 'administrator' && $_SESSION['dmsmo_usertype'] != 'staff') {
        header('location:' . URL);
    }
} else {
    header('location:' . URL);
}
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex mb-4 no-block">
                        <h5 class="card-title mb-0 align-self-center">INCOMING MEMOS</h5>
                    </div>
                    <div class="chart-area">
                        <canvas id="chartInMemo" style="height:260px; width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex mb-4 no-block">
                        <h5 class="card-title mb-0 align-self-center">OUTGOING MEMOS</h5>
                    </div>
                    <div class="chart-area">
                        <canvas id="chartOutMemo" style="height:260px; width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="row">
                <div class="col-sm-12 row mb-4">
                    <div class="col-sm-12 row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-column mb-4 justify-content-start align-items-center gap-2 no-block">
                                        <h5 class="card-title mb-0 align-self-center">Total Users:</h5>
                                        <h1> <strong><?= $userC['user_count']; ?></strong></h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-column mb-4 justify-content-start align-items-center gap-2 no-block">
                                        <h5 class="card-title mb-0 align-self-center">Total Shared:</h5>
                                        <h1> <strong><?= $sharedC['count']; ?></strong></h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-column mb-4 justify-content-start align-items-center gap-2 no-block">
                                        <h5 class="card-title mb-0 align-self-center">Total Archived:</h5>
                                        <h1> <strong><?= $archivedC['count']; ?></strong></h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-column mb-4 justify-content-start align-items-center gap-2 no-block">
                                        <h5 class="card-title mb-0 align-self-center">Total Files:</h5>
                                        <h1> <strong><?= $fileC['count']; ?></strong></h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex mb-4 no-block">
                                <h5 class="card-title mb-0 align-self-center">Users Chart</h5>
                            </div>
                            <div class="chart-area">
                                <canvas id="myPieChartUsers" style="height:260px; width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>