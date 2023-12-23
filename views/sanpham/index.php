
<?php
require_once ('models/sanpham.php');
?>

<h1 class="h3 mb-2 text-center text-gray-800 ">Sản Phẩm</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Sản Phẩm</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=sanpham&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn vị</th>
                    <th>Nhà cung cấp</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Sô lượng</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn vị</th>
                    <th>Nhà cung cấp</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Sô lượng</th>
                    <th>Action</th>

                </tr>
                </tfoot>
                <tbody>

                <?php
                foreach ($sanpham as $item){

                    ?>
                    <form method="post">
                        <tr>
                            <td><?= $item->Id   ?></td>
                            <td><?= $item->TenSP?></td>
                            <td><?= $item->IdDVT
                                ?></td> <td><?= $item->IdNCC
                                ?></td>
                            <td><?=number_format($item->GiaMua, 0,"." , ",") ?></td>
                            <td><?= number_format($item->GiaBan, 0,"." , ",")?></td>
                            <td><?= $item->SoLuong?></td>
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


