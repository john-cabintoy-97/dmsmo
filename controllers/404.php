<?php

class Page404 extends Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->view->msg = 'This page doesnt exist!';
        $this->view->status = "404";
        $this->view->msg = 'Sorry, the page you are looking for could not be found.';
        $this->view->render('404/index');
    }

    function index()
    {
        $this->view->msg = '404 not found';
        $this->view->render('404/index');
    }
}
