<form method="post" name="edit-dvt">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Id</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $donvi->Id ?> " name="id" placeholder="Id" readonly required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Đơn vị tính</label>
            <input type="phone" class="form-control" id="validationDefault02" value="<?= $donvi->DonVi ?> " name="tenkh" placeholder="Số điện thoại" required>
            <button type="submit" name="edit-dvt" class=" mt-2 btn-danger btn">Update</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['edit-dvt'])){
    $id = $donvi->Id;
    $ten= $_POST['tenkh'] ;
    DonViTinh::update($id,$ten);
}
?>
