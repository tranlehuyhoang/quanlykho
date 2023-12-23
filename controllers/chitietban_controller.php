
<?php
require_once ('controllers/base_controller.php');
require_once ('models/chitietban.php');
class ChiTietBanController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'chitietban';
    }
    public function  index()
    {
        $ctb = ChiTietBan::all();
        $data =array('ctb'=> $ctb);
        $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function edit()
    {
        $donban = DonBan::find($_GET['id']);
        $data =array('donban'=> $donban);
        $this->render('edit',$data);
    }
}
