<?php
class DonMua{

    public $Id;
    public $NgayMua;
    public $IdNV;
    public $IdNCC;
    public $ThanhTien;
    public $TrangThai;


    function __construct($Id,$NgayMua,$IdNV,$IdNCC,$ThanhTien,$TrangThai)
    {
        $this->Id = $Id;
        $this->NgayMua = $NgayMua;
        $this->IdNV =  $IdNV;
        $this->IdNCC = $IdNCC;
        $this->ThanhTien= $ThanhTien;
        $this->TrangThai= $TrangThai;
    }
    static function all()
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT db.Id ,db.NgayMua , nv.TaiKhoan ,kh.TenNCC ,db.ThanhTien,db.TrangThai FROM DonMua db JOIN NhanVien nv JOIN NhaCungCap kh ON nv.Id =db.IdNV AND kh.Id = db.IdNCC');
        foreach ($reg->fetchAll() as $item){
            $list[] =new DonMua($item['Id'],$item['NgayMua'],$item['TaiKhoan'],$item['TenNCC'],$item['ThanhTien'],$item['TrangThai']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT db.Id ,db.NgayMua , nv.TaiKhoan ,kh.TenNCC ,db.ThanhTien,db.TrangThai FROM DonMua db JOIN NhanVien nv JOIN NhaCungCap kh ON nv.Id =db.IdNV AND kh.Id = db.IdNCC WHERE db.Id = '.$id);
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new DonMua($item['Id'],$item['NgayMua'],$item['TaiKhoan'],$item['TenNCC'],$item['ThanhTien'],$item['TrangThai']);
        }
        return null;
    }
    static function add($ngayban,$IdNV,$IdNCC,$Tong,$TrangThai)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO DonMua(NgayMua,IdNV,IdNCC,ThanhTien,TrangThai) VALUES ("'.$ngayban.'",'.$IdNV.','.$IdNCC.','.$Tong.',"'.$TrangThai.'")');

    }

    static function  thanhtoan($id)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE DonMua SET TrangThai ="1" WHERE Id='.$id);
    }
    static function  chuathanhtoan($id)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE DonMua SET TrangThai ="0" WHERE Id='.$id);
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM ChiTietMua WHERE IdDonMua='.$id);
        $reg1 =$db->query('DELETE FROM DonMua WHERE Id = '.$id);
        header('location:index.php?controller=donmua&action=index');
    }
}
