<?php
require_once ('controllers/base_controller.php');
require_once ('models/nhacungcap.php');
class NhaCungCapController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'nhacungcap';
    }
    public function index()
    {
        $nhacungcap = NhaCungCap::all();
        $data =array('nhacungcap'=> $nhacungcap);
        $this->render('index',$data);
    }
    public function insert()
    {
        $this->render('insert');
    }
    public function showPost()
    {
        $nhacungcap = NhaCungCap::find($_GET['id']);
        $data = array('$nhacungcap' => $nhacungcap);
        $this->render('show', $data);
    }
    public function edit()
    {
        $nhacungcap = NhaCungCap::find($_GET['id']);
        $data = array('nhacungcap' => $nhacungcap);
        $this->render('edit', $data);
    }

}