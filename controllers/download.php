<?php

class Download extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('dl');
    }
}
