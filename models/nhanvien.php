<?php
class NhanVien
{
    public $Id;
    public $TenNV;
    public $DienThoai;
    public $Email;
    public $DiaChi;
    public $TaiKhoan;
    public $MatKhau;
    public $IsActive;


    function  __construct($Id, $TenNV, $DienThoai, $Email, $DiaChi, $TaiKhoan, $MatKhau, $IsActive)
    {
        $this->Id = $Id;
        $this->TenNV = $TenNV;
        $this->DienThoai = $DienThoai;
        $this->Email = $Email;
        $this->DiaChi = $DiaChi;
        $this->TaiKhoan = $TaiKhoan;
        $this->MatKhau = $MatKhau;
        $this->IsActive = $IsActive;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('select *from NhanVien');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new NhanVien($item['Id'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['TaiKhoan'], $item['MatKhau'], $item['IsActive']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhanVien WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['TaiKhoan'], $item['MatKhau'], $item['IsActive']);
        }
        return null;
    }
    static function add($ten, $dienthoai, $email, $diachi, $taikhoan, $matkhau, $isactive)
    {
        $matkhau = md5($matkhau);
        $db = DB::getInstance();
        $reg = $db->query('INSERT INTO NhanVien(TenNV,DienThoai,Email,DiaChi,TaiKhoan,MatKhau,IsActive) VALUES ("' . $ten . '","' . $dienthoai . '","' . $email . '","' . $diachi . '","' . $taikhoan . '","' . $matkhau . '","' . $isactive . '")');
        header('location:index.php?controller=nhanvien&action=index');
    }
    static function update($id, $ten, $dienthoai, $email, $diachi, $isactive)
    {
        // $matkhau=md5($matkhau);
        $db = DB::getInstance();
        $reg = $db->query('UPDATE NhanVien SET TenNV ="' . $ten . '",DienThoai="' . $dienthoai . '",Email="' . $email . '",DiaChi="' . $diachi . '",IsActive="' . $isactive . '" WHERE Id=' . $id);
        header('location:index.php?controller=nhanvien&action=index');
    }
    static function delete($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('DELETE FROM NhanVien WHERE Id=' . $id);
        header('location:index.php?controller=nhanvien&action=index');
    }
    static function dangnhap($taikhoan, $matkhau)
    {
        echo $taikhoan;
        echo $matkhau;

        $matkhau = md5($matkhau);
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhanVien WHERE TaiKhoan = ? AND MatKhau = ?');
        $req->execute(array($taikhoan, $matkhau));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['TaiKhoan'], $item['MatKhau'], $item['IsActive']);
        }
        return null;
    }
}
