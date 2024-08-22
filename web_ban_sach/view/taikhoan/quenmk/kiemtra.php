<form class="noidung_quenmk" action="" method="post">
    <div class="kiemtra">
        <h4>Kiểm tra</h4>
        <div class="ktra">
            <div class="sdt">
                <h5>Số điện thoại*</h5>
                <input type="text" placeholder="Số điện thoại" name="phone">
                <br><br>
                <span style="color: red;"><?php echo isset($error['phone']) ? $error['phone'] : "" ?></span>
            </div>

            <div class="emai">
                <h5>Email*</h5>
                <input type="text" placeholder="Email của bạn" name="email">
                <br><br>
                <span style="color: red;"><?php echo isset($error['email']) ? $error['email'] : "" ?></span>
            </div>
        </div>
        <input id="dangky" type="submit" value="Kiểm tra" name="kiemtra">
        <button id="dangnhap"><a href="index.php?act=dangnhap">Đăng nhập</a></button>
    </div>
</form>