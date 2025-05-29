<?php

session_start();


require 'libs/bootstrap.php';
require 'libs/controller.php';
require 'libs/model.php';
require 'libs/view.php';
require 'config/path.php';
require 'models/admin_model.php';
$model = new Model();

$model->loadAdmin();
$app = new Boostrap();
