<?php
require_once ('models/chitietmua.php');
$list =[];
$db =DB::getInstance();
$reg = $db->query('SELECT ct.Id ,db.Id As "Don",ct.TenSP ,dvt.DonVi ,ct.GiaMua,ct.SoLuong ,ct.ThanhTien FROM ChiTietMua ct JOIN DonViTinh dvt JOIN donmua db ON ct.IdDonMua = db.Id AND dvt.Id = ct.IdDVT WHERE ct.IdDonMua='.$donmua->Id);
foreach ($reg->fetchAll() as $item){
    $list[] =new ChiTietMua($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['SoLuong'],$item['ThanhTien']);
}

?>
    <h1 class="h3 mb-2 text-center text-gray-800 ">Chi tiết đơn</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ngày Bán</th>
                        <th>Nhân Viên</th>
                        <th>Nhà Cung Cấp</th>
                        <th>Tổng tiền</th>
                        <th>Trạng Thái</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td><?=$donmua->Id ?></td>
                        <td><?=  date('d/m/Y H:i:s', strtotime($donmua->NgayMua))?></td>
                        <td><?=$donmua->IdNV ?></td>
                        <td><?=$donmua->IdNCC ?></td>
                        <td><?=number_format($donmua->ThanhTien,0,",",".") ?> VNĐ</td>
                        <td><?php
                            if ($donmua->TrangThai=="1")
                                echo "Đã Thanh Toán";
                            else echo "Chưa thanh toán";

                            ?></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đơn</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>

                    </tr>
                    </tfoot>

                    <tbody>

                    <?php
                    $dem=1;
                    foreach ($list as $item) {

                        echo  "<tr><td>$dem</td>";
                        echo  "<td>$item->TenSP</td>";
                        echo  "<td>". number_format($item->GiaMua,0,",",".")." VNĐ</td>";
                        echo  "<td>$item->SoLuong</td>";
                        echo  "<td>". number_format($item->ThanhTien,0,",",".")." VNĐ</td>";
                        /*                echo  " <td><?=$donmua->IdNV ?></td>";*/
                        /*                echo  " <td><?=$donmua->IdKH ?></td>";*/
                        /*                 echo  "<td><?=number_format($donmua->ThanhTien,0,",",".") ?> VNĐ</td>";*/
                        /*                echo  " <td><?=$donmua->TrangThai ?></td>";*/
//                    echo "</tr>";
                        $dem++;
                    }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
        <form method="post" name="dc">
            <?php

            if ($donmua->TrangThai=="1"){ ?>
                <button type="submit" class="btn-outline-primary btn"  disabled >Đã Thanh Toán</button>
                <button type="submit"  class="btn-outline-primary btn" name="chua" >Chưa Thanh Toán</button>
                <?php

            }
            else {
                ?>
                <button type="submit"  class="btn-outline-primary btn" name="thanhtoan" >Đã Thanh Toán</button>
                <button type="submit"  class="btn-outline-primary btn" disabled>Chưa Thanh Toán</button>
            <?php } ?>
        </form>
    </div>
<?php

if (isset($_POST['chua'])) {
    donmua::chuathanhtoan($donmua->Id);
}
if (isset($_POST['thanhtoan'])) {
    donmua::thanhtoan($donmua->Id);
}

?>