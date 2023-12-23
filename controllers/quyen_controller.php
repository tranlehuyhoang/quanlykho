<?php
require_once ('controllers/base_controller.php');
require_once ('models/quyen.php');
class QuyenController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'quyen';
    }
    public function  index()
    {
        if($_SESSION['quyen']!='admin') {
            header('location:permisson.php');
        }
        else
            {
                $quyen = Quyen::all();
                $data =array('quyen'=> $quyen);
                $this->render('index',$data);
        }

    }
    public function  insert()
    {
        if($_SESSION['quyen']!='admin') {
            header('location:permisson.php');
        }
        else
        {
            $this->render('insert');
        }

    }
    public function edit()
    {
        if($_SESSION['quyen']!='admin') {
            header('location:permisson.php');
        }
        else {
            $quyen = Quyen::find($_GET['id']);
            $data =array('quyen'=> $quyen);
            $this->render('edit',$data);
        }

    }
}
