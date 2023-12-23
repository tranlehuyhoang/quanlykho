<?php
require_once ('controllers/base_controller.php');
require_once ('models/khachhang.php');
class KhachHangsController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'khachhangs';
    }
    public function index()
    {
        $khachhangs = KhachHang::all();
        $data =array('khachhangs'=> $khachhangs);
        $this->render('index',$data);
    }
    public function insert()
    {
        //$khachhangs = KhachHang::all();
        //$data =array('khachhangs'=> $khachhangs);
        $this->render('insert');
    }
    public function showPost()
    {
        $khachs = KhachHang::find($_GET['id']);
        $data = array('khachhangs' => $khachs);
        $this->render('show', $data);
    }
    public function edit()
    {
            $khachs = KhachHang::find($_GET['id']);
            $data = array('khachhangs' => $khachs);
            $this->render('edit', $data);
    }

}