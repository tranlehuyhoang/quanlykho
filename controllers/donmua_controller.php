
<?php
require_once ('controllers/base_controller.php');
require_once ('models/donmua.php');
class DonMuaController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'donmua';
    }
    public function  index()
    {
        $donmua = DonMua::all();
        $data =array('donmua'=> $donmua);
        $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function  show()
    {
        $donmua = DonMua::find($_GET['id']);
        $data = array('donmua' => $donmua);
        $this->render('show', $data);
    }
    public function  print()
    {
        $donmua = DonMua::find($_GET['id']);
        $data = array('donmua' => $donmua);
        $this->render('print', $data);
    }

}
