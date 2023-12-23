
<form method="post" name="edit-kh">
<div class="form-group ml-5">
    <div class="col-md-4 mb-3">
        <label for="validationDefault01">Tên Khách Hàng</label>
        <input type="text" class="form-control" id="validationDefault01" value="<?= $khachhangs->TenKH ?> " name="tenkh" placeholder="Tên" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationDefault02">Điện Thoại</label>
        <input type="phone" class="form-control" id="validationDefault02" value="<?= $khachhangs->DienThoai ?> " name="sdt" placeholder="Số điện thoại" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="validationDefault02">Email</label>
        <input type="email" class="form-control" id="validationDefault02" value="<?= $khachhangs->Email ?> " name="email" placeholder="Nhập Email" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationDefault02">Địa Chỉ</label>
        <input type="text" class="form-control" id="validationDefault02" value="<?= $khachhangs->DiaChi ?> " name="diachi" placeholder="Nhập Địa Chỉ.." required>
        <button type="submit" name="edit-kh" class=" mt-2 btn-danger btn">Update</button>
    </div>

</div>
</form>
<?php
if(isset($_POST['edit-kh'])){
    $id = $khachhangs->Id;
    $ten= $_POST['tenkh'] ;
    $sdt= $_POST['sdt'];
    $email= $_POST['email'];
    $diachi= $_POST['diachi'];
    KhachHang::update($id,$ten,$sdt,$email,$diachi);
}
?>
