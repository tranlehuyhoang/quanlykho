<?php
class SanPham
{
    public $Id;
    public $TenSP;
    public $IdDVT;
    public $IdNCC;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;

    function   __construct($Id,$TenSP,$IdDVT,$IdNCC,$GiaMua,$GiaBan,$SoLuong)
    {
        $this->Id=$Id;
        $this->TenSP=$TenSP;
        $this->IdDVT=$IdDVT;
        $this->IdNCC=$IdNCC;
        $this->GiaMua=$GiaMua;
        $this->GiaBan=$GiaBan;
        $this->SoLuong=$SoLuong;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT sp.Id,sp.TenSP,dvt.DonVi,ncc.TenNCC,sp.GiaMua,sp.GiaBan,sp.SoLuong FROM SanPham sp JOIN DonViTinh dvt JOIN NhaCungCap ncc ON sp.IdNCC = ncc.Id AND sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new SanPham($item['Id'], $item['TenSP'], $item['DonVi'],$item['TenNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM SanPham WHERE Id ='.$id);
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
                return new SanPham($item['Id'], $item['TenSP'], $item['IdDVT'],$item['IdNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong']);
        }
        return null;
    }
    static function add($ten,$IdDVT,$IdNCC,$giamua,$giaban,$soluong)
    {
        $db = DB::getInstance();
        $reg=$db->query('INSERT INTO SanPham(TenSP,IdDVT,IdNCC,GiaMua,GiaBan,SoLuong) VALUES ("'.$ten.'",'.$IdDVT.','.$IdNCC.','.$giamua.','.$giaban.','.$soluong.')');
        header('location:index.php?controller=sanpham&action=index');
    }
    static function update($id,$ten,$IdDVT,$IdNCC,$giamua,$giaban,$soluong)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE SanPham SET TenSP ="'.$ten.'",IdDVT="'.$IdDVT.'",IdNCC="'.$IdNCC.'",GiaMua="'.$giamua.'",GiaBan="'.$giaban.'",SoLuong="'.$soluong.'" WHERE Id='.$id);
        header('location:index.php?controller=sanpham&action=index');
    }
    static function updatesl($id,$soluong)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE SanPham SET SoLuong="'.$soluong.'" WHERE Id='.$id);
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM SanPham WHERE Id='.$id);
        header('location:index.php?controller=sanpham&action=index');
    }
}