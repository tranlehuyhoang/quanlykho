

<?php
require_once ('models/donmua.php');
?>

<h1 class="h3 mb-2 text-center text-gray-800 ">Đơn bán</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=donmua&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Thời gian</th>
                    <th>Nhân Viên</th>
                    <th>Nhà Cung Cấp</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Thời gian</th>
                    <th>Nhân Viên</th>
                    <th>Nhà Cung Cấp</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Action</th>

                </tr>
                </tfoot>
                <tbody>

                <?php
                foreach ($donmua as $item){

                    ?>
                    <form method="post">
                        <tr>
                            <td><?= $item->Id   ?></td>
                            <td><?=date('d/m/Y', strtotime($item->NgayMua))?></td>
                            <td><?= $item->IdNV
                                ?></td>
                            <td><?= $item->IdNCC?></td>
                            <td><?= number_format($item->ThanhTien, 0,"." , ",")?> VNĐ</td>
                            <td><?php
                                if ($item->TrangThai=="1"){
                                    echo "Đã Thanh Toán";
                                }
                                else {
                                    echo "Chưa thanh toán";
                                }
                                ?></td>
                            <td><!--<a  href="index.php?controller=khachhangs&action=showPost&id=--><!--"  class='btn btn-primary mr-3'>Details</a>-->
                                <a  href="index.php?controller=donmua&action=show&id=<?= $item->Id?>"  class='btn btn-primary mr-3'>Details</a>

                                <a  href="index.php?controller=donmua&action=print&id=<?= $item->Id?>"  class='btn btn-primary mr-3'>Print</a>
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
    donmua::delete($id);
}
?>


