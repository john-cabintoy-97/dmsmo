<?php

class Forgot extends Controller{

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('forgot/index');
    }

}
