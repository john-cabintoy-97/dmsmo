<?php

// $m->sendEmail('techcabz@gmail.com', 'test', 'x', 'x');

// print_r($m);
// exit();
?>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= URL ?>admin?p=report">Memorandums Reports</a></li>
            </ol>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card shadow mt-3 mb-5">
                    <div class="card-body">
                        <h4 class="card-title m-0 p-0">
                            <div class="d-flex justify-content-between mb-4 align-items-center">
                                <h5 class="m-0 font-weight-bold">Memorandums Reports</h5>

                            </div>
                        </h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="container1-tab" data-bs-toggle="tab" data-bs-target="#container1" type="button" role="tab" aria-controls="container1" aria-selected="true">Incoming Memo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="container2-tab" data-bs-toggle="tab" data-bs-target="#container2" type="button" role="tab" aria-controls="container2" aria-selected="false">Outgoing Memo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="container3-tab" data-bs-toggle="tab" data-bs-target="#container3" type="button" role="tab" aria-controls="container3" aria-selected="false">Users</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="container1" role="tabpanel" aria-labelledby="container1-tab">
                                <div class="mt-5" id="reportIncoming"></div>
                            </div>
                            <div class="tab-pane fade" id="container2" role="tabpanel" aria-labelledby="container2-tab">
                                <div class="mt-5" id="reportOutgoing"></div>
                            </div>
                            <div class="tab-pane fade " id="container3" role="tabpanel" aria-labelledby="container3-tab">
                                <div class="mt-5" id="reportUsersGraph"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>