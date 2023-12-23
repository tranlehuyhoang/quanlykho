<?php
class ChiTietMua{


    public $Id;
    public $IdDonMua;
    public $TenSP;
    public $IdDVT;
    public $GiaMua;
    public $SoLuong;
    public $ThanhTien;


    function __construct($Id,$IdDonMua,$TenSP,$IdDVT,$GiaMua,$SoLuong,$ThanhTien)
    {
        $this->Id = $Id;
        $this->IdDonMua = $IdDonMua;
        $this->TenSP=  $TenSP;
        $this->IdDVT=  $IdDVT;
        $this->GiaMua = $GiaMua;
        $this->SoLuong = $SoLuong;
        $this->ThanhTien= $ThanhTien;
    }
    static function all()
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT ct.Id ,db.Id As "Don",ct.TenSP ,dvt.DonVi ,ct.GiaMua,ct.SoLuong ,ct.ThanhTien FROM ChiTietMua ct JOIN DonViTinh dvt JOIN DonMua db ON ct.IdDonMua = db.Id AND dvt.Id = ct.IdDVT');
        foreach ($reg->fetchAll() as $item){
            $list[] =new ChiTietMua($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['SoLuong'],$item['ThanhTien']);
        }
        return $list;
    }
    static function find($id)
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT ct.Id ,db.Id As "Don",ct.TenSP ,dvt.DonVi ,ct.GiaMua,ct.SoLuong ,ct.ThanhTien FROM ChiTietMua ct JOIN DonViTinh dvt JOIN DonMua db ON ct.IdDonMua = db.Id AND dvt.Id = ct.IdDVT WHERE ct.IdDonMua='.$id);
        foreach ($reg->fetchAll() as $item){
            $list[] =new ChiTietMua($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['SoLuong'],$item['ThanhTien']);
        }
        return $list;
    }
    static function add($IdDonHang,$IdSP,$IdDVT,$GiaMua,$SoLuong,$ThanhTien)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO ChiTietMua(IdDonMua,TenSP,IdDVT,GiaMua,SoLuong,ThanhTien) VALUES ('.$IdDonHang.',"'.$IdSP.'",'.$IdDVT.','.$GiaMua.','.$SoLuong.','.$ThanhTien.')');

    }

}
