<?php
require_once ('controllers/base_controller.php');
require_once ('models/donvitinh.php');
class DonViTinhController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'donvitinh';
    }
    public function  index()
    {
        $donvis = DonViTinh::all();
        $data =array('donvi'=> $donvis);
        $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function edit()
    {
        $donvi = DonViTinh::find($_GET['id']);
        $data = array('donvi'=>$donvi);
        $this->render('edit',$data);
    }
}
