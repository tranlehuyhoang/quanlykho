<script>
    $(document).click(function () {

    });

    $('#btnThemSanPham').click(function() {
        // debugger;
        // Lấy thông tin Sản phẩm
        if ($('#sp_ma option:selected').text()==''){
            alert('loi');
        }
        else {
        var sp_ma = $('#sp_ma').val();
        var sp_gia = $('#sp_ma option:selected').data('sp_gia');
        var sp_sl = $('#sp_ma option:selected').data('sp_sl');
        var sp_ten = $('#sp_ma option:selected').text();
        var soluong = $('#soluong').val();
        var thanhtien = (soluong * sp_gia);

        // Tạo mẫu giao diện HTML Table Row
        var htmlTemplate = '<tr>';
        htmlTemplate += '<td>' + sp_ten + '<input type="hidden" name="sp_ma[]" value="' + sp_ma + '"/></td>';
        htmlTemplate += '<td>' + soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + soluong + '"/></td>';
        htmlTemplate += '<td>' + sp_gia + '<input type="hidden" name="sp_dh_dongia[]" value="' + sp_gia + '"/></td>';
        htmlTemplate += '<td>' + thanhtien + '<input type="hidden" name="sp_dh_sl[]" value="' + sp_sl + '"/></td>';
        htmlTemplate += '<td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td>';
        htmlTemplate += '</tr>';

        // Thêm vào TABLE BODY
        $('#tblChiTietDonHang tbody').append(htmlTemplate);
        }
        // Clear
        $('#sp_ma').val('');
        $('#soluong').val('');
    });


    $('#btnThemSanPhammua').click(function() {
        // debugger;
        // Lấy thông tin Sản phẩm
        // if ($('#sp_ma option:selected').text()==''){
        //     alert('loi');
        // }
        // else {
            var sp_ma = $('#tensp').val();
            var sp_gia = $('#gia').val();
            var dvt_ma = $('#dvt').val();

            var dvt = $('#dvt option:selected').text();
            var sp_ten = $('#tensp').val();
            var soluong = $('#soluong').val();
            var thanhtien = (soluong * sp_gia);
            // var sp_ten = $('#gia option:selected').text();

            // Tạo mẫu giao diện HTML Table Row
            var htmlTemplate = '<tr>';
            htmlTemplate += '<td>' + sp_ten + '<input type="hidden" name="sp_ma[]" value="' + sp_ma + '"/></td>';
            htmlTemplate += '<td>' + soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + soluong + '"/></td>';
            htmlTemplate += '<td>' + dvt + '<input type="hidden" name="sp_dh_dvt[]" value="' + dvt_ma + '"/></td>';
            htmlTemplate += '<td>' + sp_gia + '<input type="hidden" name="sp_dh_dongia[]" value="' + sp_gia + '"/></td>';
            htmlTemplate += '<td>' + thanhtien + '</td>';
            htmlTemplate += '<td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td>';
            htmlTemplate += '</tr>';

            // Thêm vào TABLE BODY
            $('#tblChiTietDonHang tbody').append(htmlTemplate);
        // }
        // Clear
        $('#sp_ma').val('');
        $('#soluong').val('');
    });
    $('#chiTietDonHangContainer').on('click', '.btn-delete-row', function() {
        // Ta có cấu trúc
        // <tr>
        //    <td>
        //        <button class="btn-delete-row"></button>     <--- $(this) chính là đối tượng đang được người dùng click
        //    </td>
        // </tr>

        // Từ nút người dùng click -> tìm lên phần tử cha -> phần tử cha
        // Xóa dòng TR
        $(this).parent().parent()[0].remove();
    });
</script>