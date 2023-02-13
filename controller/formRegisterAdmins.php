<?php
class FormRegisterAdmins extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('dashboard/formRegisterAdmins');
    }
}