<?php
require_once ('models/chitietmua.php');
$list =[];
$db =DB::getInstance();
$reg = $db->query('SELECT ct.Id ,db.Id As "Don",ct.TenSP ,dvt.DonVi ,ct.GiaMua,ct.SoLuong ,ct.ThanhTien FROM ChiTietMua ct JOIN DonViTinh dvt JOIN DonMua db ON ct.IdDonMua = db.Id AND dvt.Id = ct.IdDVT WHERE ct.IdDonMua='.$donmua->Id);
foreach ($reg->fetchAll() as $item){
    $list[] =new ChiTietMua($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['SoLuong'],$item['ThanhTien']);
}


?>


    <body class="A4">



    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm" style="padding-left: 10px;padding-right: 10px">
        <!-- Thông tin Cửa hàng -->
        <table border="0" width="100%" cellspacing="0">
            <tbody>
            <tr>
                <td align="center"><img src="Assets/img/Layer.png" width="100px" height="100px" /></td>
                <td align="center">
                    <b style="font-size: 2em;">SKT - Giải Pháp Tương Lai</b><br />
                    <small>Phần mềm quản lý kho nhanh chóng hiệu quả hihi</small><br />
                    <small>Giúp các bạn có niềm tin, hành trang vững vàng trên con đường trở thành Nhà kinh doanh</small>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- Thông tin đơn hàng -->
        <p style="margin-top: 50px"><i><u>Thông tin Đơn hàng</u></i></p>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
            <tr>
                <td width="30%">Nhà Cung Cấp:</td>
                <td><b>
                        <?=$donmua->IdNCC?></b></td>
            </tr>
            <tr>
                <td>Ngày lập:</td>
                <td><b><?= date('d/m/Y H:i:s', strtotime($donmua->NgayMua))?></b></td>
            </tr>
            <tr>
                <td>Nhân viên:</td>
                <td><b><?=$donmua->IdNV?></b></td>
            </tr>
            <tr>
                <td>Tổng thành tiền:</td>
                <td><b><?=number_format($donmua->ThanhTien,0,",",".") ?> VNĐ</b></td>
            </tr>
            <tr>
                <td>Trạng Thái:</td>
                <td><b><?php
                        if ($donmua->TrangThai=="1")
                            echo "Đã Thanh Toán";
                        else echo "Chưa thanh toán";

                        ?></b></td>
            </tr>
            </tbody>
        </table>

        <!-- Thông tin sản phẩm -->
        <p><i><u>Chi tiết đơn hàng</u></i></p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
            <tr style="text-align: center;">
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn vị tính</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $dem=1;
            foreach ($list as $item)
            {


                ?>
                <tr>
                    <td align="center"> <?=$dem?></td>
                    <td align="center"><?=$item->TenSP?></td>
                    <td align="center"><?=$item->SoLuong?></td>
                    <td align="center"><?=$item->IdDVT?></td>
                    <td align="right"><?=number_format($item->GiaMua,0,",",".")?> VNĐ</td>
                    <td align="right"><?=number_format($item->ThanhTien,0,",",".")?> VNĐ</td>

                </tr>
                <?php
                $dem=$dem+1;
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" align="right"><b>Tổng thành tiền</b></td>
                <td align="right"><b><?=number_format($donmua->ThanhTien,0,",",".") ?> VNĐ</b></td>
            </tr>
            </tfoot>
        </table>

        <!-- Thông tin Footer -->
        <br/>
        <table border="0" width="100%">
            <tbody>
            <tr>
                <td align="center">
                    <small>Xin cám ơn Quý khách đã ủng hộ Cửa hàng, Chúc Quý khách An Khang, Thịnh Vượng!</small>
                </td>
            </tr>
            </tbody>
        </table>
    </section>
    <!-- End block content -->
    </body>

<?php

if (isset($_POST['chua'])) {
    donmua::chuathanhtoan($donmua->Id);
}
if (isset($_POST['thanhtoan'])) {
    donmua::thanhtoan($donmua->Id);
}

?>
