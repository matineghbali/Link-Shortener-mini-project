<?php namespace App\Controller\Admin;


use App\Controller\Controller;
use App\Helper\Auth;
use App\Model\Link;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!checkLogin()){
            echo "not access, please login.";
            exit() ;
        }
    }

    public function index()
    {
        echo "Admin Page";
        exit;
    }

}