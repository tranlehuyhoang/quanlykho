
<?php
require_once ('models/chitietban.php');
?>

<h1 class="h3 mb-2 text-center text-gray-800 ">Chi tiết đơn bán</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết đơn bán</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=sanpham&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Đơn hàng</th>
                    <th>Tên Sản phẩm</th>
                    <th>ĐƠn vị tính</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Sô lượng</th>
                    <th>Thành tiền</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>ID Đơn hàng</th>
                    <th>Tên Sản phẩm</th>
                    <th>ĐƠn vị tính</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Sô lượng</th>
                    <th>Thành tiền</th>
                    <th>Action</th>

                </tr>
                </tfoot>
                <tbody>

                <?php
                foreach ($ctb as $item){

                    ?>
                    <form method="post">
                        <tr>
                            <td><?= $item->Id   ?></td>
                            <td><?= $item->IdDonBan ?></td>
                            <td><?= $item->IdSP ?></td>
                            <td><?= $item->IdDVT ?></td>
                            <td><?=number_format($item->GiaMua, 2,"." , ",") . ' vnđ' ?></td>
                            <td><?= number_format($item->GiaBan, 2,"." , ",") . ' vnđ'?></td>
                            <td><?= $item->SoLuong?></td>
                            <td><?= number_format($item->ThanhTien, 2,"." , ",") . ' vnđ'?></td>
                            <td><!--<a  href="index.php?controller=khachhangs&action=showPost&id=--><!--"  class='btn btn-primary mr-3'>Details</a>-->
                                <a  href="index.php?controller=sanpham&action=edit&id=<?= $item->Id?>"  class='btn btn-primary mr-3'>Edit</a>
                                <button type="submit" name="dele" value="<?= $item->Id ?>"    class='btn btn-danger'>Delete</button>
                    </form>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if(isset($_POST['dele'])){
    $id =$_POST['dele'];
    SanPham::delete($id);
}
?>


