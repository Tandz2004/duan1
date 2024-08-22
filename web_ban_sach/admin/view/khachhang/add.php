<div class="add_khachhang">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;">THÊM MỚI KHÁCH HÀNG</h2>
    </div>
    <div class="row2form_content ">
        <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">
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
                    <select name="role_id" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                        ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="nut_chucnang">
                <input class="mr20" type="submit" value="Thêm mới" name="addkh">
                <a href="index.php?act=listkh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>