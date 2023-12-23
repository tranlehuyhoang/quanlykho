<?php
class NhaCungCap{
    public $Id;
    public $TenNCC;
    public $DienThoai;
    public $Email;
    public $DiaChi;

    function __construct($Id,$TenNCC,$DienThoai,$Email,$DiaChi)
    {
        $this->Id=$Id;
        $this->TenNCC=$TenNCC;
        $this->DienThoai=$DienThoai;
        $this->Email=$Email;
        $this->DiaChi=$DiaChi;
    }
    static function all()
    {
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('select *from NhaCungCap');
        foreach ($reg->fetchAll() as $item){
            $list[] =new NhaCungCap($item['Id'],$item['TenNCC'],$item['DienThoai'],$item['Email'],$item['DiaChi']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhaCungCap WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhaCungCap($item['Id'],$item['TenNCC'],$item['DienThoai'],$item['Email'],$item['DiaChi']);
        }
        return null;
    }
    static function add($ten,$dienthoai,$email,$diachi)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO NhaCungCap(TenNCC,DienThoai,Email,DiaChi) VALUES ("'.$ten.'","'.$dienthoai.'","'.$email.'","'.$diachi.'")');
        header('location:index.php?controller=nhacungcap&action=index');
    }
    static function update($id,$ten,$dienthoai,$email,$diachi)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE NhaCungCap SET TenNCC ="'.$ten.'",DienThoai="'.$dienthoai.'",Email="'.$email.'",DiaChi="'.$diachi.'" WHERE Id='.$id);
        header('location:index.php?controller=nhacungcap&action=index');
    }
    static function  delete($id){
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM NhaCungCap WHERE id='.$id);
        header('location:index.php?controller=nhacungcap&action=index');
    }

}