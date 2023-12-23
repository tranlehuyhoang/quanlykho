<?php
require_once('controllers/base_controller.php');

class TrangChuController extends BaseController
{
    function __construct()
    {
        $this->folder = 'trangchu';
    }

    public function home()
    {
        $data = array(
            'name' => 'Mot',
            'age' => 22
        );
        $this->render('home', $data);
    }

    public function error()
    {
        $this->render('error');
    }


    public function  logout(){
        $this->render('logout');
    }
}