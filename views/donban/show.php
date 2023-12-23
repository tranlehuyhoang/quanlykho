<?php
require_once ('models/chitietban.php');
$list =[];
$db =DB::getInstance();
$reg = $db->query('SELECT ct.Id ,db.Id As "Don",sp.TenSP ,dvt.DonVi ,ct.GiaMua,ct.GiaBan ,ct.SoLuong ,ct.ThanhTien FROM ChiTietBan ct JOIN DonViTinh dvt JOIN DonBan db JOIN SanPham sp ON ct.IdDonBan = db.Id AND ct.IdSP = sp.Id AND sp.IdDVT = dvt.Id WHERE ct.IdDonBan='.$donban->Id);
foreach ($reg->fetchAll() as $item){
    $list[] =new ChiTietBan($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['GiaBan'],$item['SoLuong'],$item['ThanhTien']);
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
                    <th>Khách Hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                </tr>
                </thead>

                <tbody>
<tr>
    <td><?=$donban->Id ?></td>
    <td><?=  date('d/m/Y H:i:s', strtotime($donban->NgayBan))?></td>
    <td><?=$donban->IdNV ?></td>
    <td><?=$donban->IdKH ?></td>
    <td><?=number_format($donban->ThanhTien,0,",",".") ?> VNĐ</td>
    <td><?php
        if ($donban->TrangThai=="1")
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
                    echo  "<td>$item->IdSP</td>";
                    echo  "<td>". number_format($item->GiaBan,0,",",".")." VNĐ</td>";
                    echo  "<td>$item->SoLuong</td>";
                    echo  "<td>". number_format($item->ThanhTien,0,",",".")." VNĐ</td>";
/*                echo  " <td><?=$donban->IdNV ?></td>";*/
/*                echo  " <td><?=$donban->IdKH ?></td>";*/
/*                 echo  "<td><?=number_format($donban->ThanhTien,0,",",".") ?> VNĐ</td>";*/
/*                echo  " <td><?=$donban->TrangThai ?></td>";*/
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

    if ($donban->TrangThai=="1"){ ?>
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
        DonBan::chuathanhtoan($donban->Id);
    }
    if (isset($_POST['thanhtoan'])) {
        DonBan::thanhtoan($donban->Id);
    }

?>