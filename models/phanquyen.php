<?php
class PhanQuyen
{
    public $Id;
    public $IdNV;
    public $IdQuyen;


    function   __construct($Id,$IdNV,$IdQuyen)
    {
        $this->Id=$Id;
        $this->IdNV=$IdNV;
        $this->IdQuyen=$IdQuyen;

    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT ds.Id ,nv.TaiKhoan ,q.TenQuyen FROM DanhSachQuyen ds JOIN NhanVien nv JOIN Quyen q ON ds.IdNV = nv.Id AND ds.IdQuyen = q.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new PhanQuyen($item['Id'], $item['TaiKhoan'], $item['TenQuyen']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM DanhSachQuyen  WHERE Id = :id');
        //$req = $db->prepare('SELECT ds.Id ,nv.TenNV ,q.TenQuyen FROM DanhSachQuyen ds JOIN NhanVien nv JOIN Quyen q ON ds.IdNV = nv.Id AND ds.IdQuyen = q.Id WHERE sp.Id ='.$id);
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new PhanQuyen($item['Id'],$item['IdNV'],$item['IdQuyen']);
        }
        return null;
    }
    static function add($IdNV,$IdQuyen)
    {
        $db = DB::getInstance();
        $reg=$db->query('INSERT INTO DanhSachQuyen(IdNV,IdQuyen) VALUES ('.$IdNV.','.$IdQuyen.')');
        header('location:index.php?controller=phanquyen&action=index');
    }
    static function update($id,$IdNV,$IdQuyen)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE DanhSachQuyen SET IdNV='.$IdNV.',IdQuyen='.$IdQuyen.' WHERE Id='.$id);
        header('location:index.php?controller=phanquyen&action=index');
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM DanhSachQuyen WHERE id='.$id);
        header('location:index.php?controller=phanquyen&action=index');
    }
}