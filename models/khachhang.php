<?php
class KhachHang{
    public $Id;
    public $TenKH;
    public $DienThoai;
    public $Email;
    public $DiaChi;

    function __construct($Id,$TenKH,$DienThoai,$Email,$DiaChi)
    {
        $this->Id=$Id;
        $this->TenKH=$TenKH;
        $this->DienThoai=$DienThoai;
        $this->Email=$Email;
        $this->DiaChi=$DiaChi;
    }
    static function all()
    {
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('select *from KhachHang');
        foreach ($reg->fetchAll() as $item){
            $list[] =new KhachHang($item['Id'],$item['TenKH'],$item['DienThoai'],$item['Email'],$item['DiaChi']);
        }
        return $list;
    }
    static function find($id)
    {
            $db = DB::getInstance();
            $req = $db->prepare('SELECT * FROM KhachHang WHERE Id = :id');
            $req->execute(array('id' => $id));

            $item = $req->fetch();
            if (isset($item['Id'])) {
                return new KhachHang($item['Id'],$item['TenKH'],$item['DienThoai'],$item['Email'],$item['DiaChi']);
            }
            return null;
    }
    static function add($ten,$dienthoai,$email,$diachi)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO KhachHang(TenKH,DienThoai,Email,DiaChi) VALUES ("'.$ten.'","'.$dienthoai.'","'.$email.'","'.$diachi.'")');
        header('location:index.php?controller=khachhangs&action=index');
    }
    static function update($id,$ten,$dienthoai,$email,$diachi)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE KhachHang SET TenKH ="'.$ten.'",DienThoai="'.$dienthoai.'",Email="'.$email.'",DiaChi="'.$diachi.'" WHERE Id='.$id);
        header('location:index.php?controller=khachhangs&action=index');
    }
    static function  delete($id){
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM KhachHang WHERE id='.$id);
        header('location:index.php?controller=khachhangs&action=index');
    }

}