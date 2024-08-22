
<?php

if (is_array($khachhang)) {
    extract($khachhang);
}

?>

<div class="add_khachhang">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;">SỬA KHÁCH HÀNG</h2>
    </div>
    <div class="row2form_content ">
        <form action="index.php?act=updatekh&user_id=<?php echo $user_id; ?>" method="POST" enctype="multipart/form-data">
            <hr>
            <br>
            <div class="add_sp">
                <div class="thongtin_sanpham">
                    <label> Tên khách hàng </label> <br>
                    <input type="text" name="username" placeholder="nhập vào tên khách hàng">
                </div>
                <div class="thongtin_sanpham">
                    <label> Password </label> <br>
                    <input type="text" name="password" placeholder="nhập vào password">
                </div>
                <div class="thongtin_sanpham">
                    <label> Email </label> <br>
                    <input type="text" name="email" placeholder="nhập vào email">
                </div>
                <div class="thongtin_sanpham">
                    <label> SĐT </label> <br>
                    <input type="number" name="phone" placeholder="nhập vào số điện thoại">
                </div>
                <div class="thongtin_sanpham">
                    <label> Địa chỉ </label> <br>
                    <input type="text" name="adress" placeholder="nhập vào địa chỉ">
                </div>
                <div class="thongtin_sanpham">
                    <label> Role </label> <br>
                    <select name="iddm" id="">
                    <?php foreach ($listkhachhang as $danhmuc) {
                            extract($danhmuc);?>
                        <option value="0" selected><?php echo $user_id; ?></option>
                        
                        
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="nut_chucnang">
                <input class="mr20" type="submit" value="Chỉnh sửa" name="suakh">
                <a href="index.php?act=listkh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>