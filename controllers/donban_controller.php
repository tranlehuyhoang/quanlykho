
<?php
require_once ('controllers/base_controller.php');
require_once ('models/donban.php');
class DonBanController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'donban';
    }
    public function  index()
    {
        $donban = DonBan::all();
        $data =array('donban'=> $donban);
        $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function  show()
    {
        $donban = DonBan::find($_GET['id']);
        $data = array('donban' => $donban);
        $this->render('show', $data);
    }
    public function  print()
    {
        $donban = DonBan::find($_GET['id']);
        $data = array('donban' => $donban);
        $this->render('print', $data);
    }

}
