<form method="post" name="create-kh">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Đơn vị tính</label>
            <input type="text" class="form-control" id="validationDefault01" name="tenkh" placeholder="Tên đơn vị" required>
            <button type="submit" name="create-kh" class=" mt-2 btn-danger btn">Thêm</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['create-kh'])){
    $ten= $_POST["tenkh"];
    DonViTinh::add($ten);
}
?>