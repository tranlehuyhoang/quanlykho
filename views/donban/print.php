<?php
require_once ('models/chitietban.php');
$list1 =[];
$db1 =DB::getInstance();
$reg1 = $db1->query('SELECT ct.Id ,db.Id As "Don",sp.TenSP ,dvt.DonVi ,ct.GiaMua,ct.GiaBan ,ct.SoLuong ,ct.ThanhTien FROM ChiTietBan ct JOIN DonViTinh dvt JOIN DonBan db JOIN SanPham sp ON ct.IdDonBan = db.Id AND ct.IdSP = sp.Id AND sp.IdDVT = dvt.Id WHERE ct.IdDonBan='.$donban->Id);
foreach ($reg1->fetchAll() as $item){
    $list1[] =new ChiTietBan($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['GiaBan'],$item['SoLuong'],$item['ThanhTien']);
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
                <td width="30%">Khách hàng:</td>
                <td><b>
                      <?=$donban->IdKH?></b></td>
            </tr>
            <tr>
                <td>Ngày lập:</td>
                <td><b><?= date('d/m/Y H:i:s', strtotime($donban->NgayBan))?></b></td>
            </tr>
            <tr>
                <td>Nhân viên:</td>
                <td><b><?=$donban->IdNV?></b></td>
            </tr>
            <tr>
                <td>Tổng thành tiền:</td>
                <td><b><?=number_format($donban->ThanhTien,0,",",".") ?> VNĐ</b></td>
            </tr>
            <tr>
                <td>Trạng Thái:</td>
                <td><b><?php
                        if ($donban->TrangThai=="1")
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
            <tr style="text-align: center">
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
            foreach ($list1 as $item)
            {


            ?>
                <tr>
                    <td align="center"> <?=$dem?></td>
                    <td align="center"><?=$item->IdSP?></td>
                    <td align="center"><?=$item->SoLuong?></td>
                    <td align="center"><?=$item->IdDVT?></td>
                    <td align="right"><?=number_format($item->GiaBan,0,",",".")?> VNĐ</td>
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
                <td align="right"><b><?=number_format($donban->ThanhTien,0,",",".") ?> VNĐ</b></td>
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
    DonBan::chuathanhtoan($donban->Id);
}
if (isset($_POST['thanhtoan'])) {
    DonBan::thanhtoan($donban->Id);
}

?>