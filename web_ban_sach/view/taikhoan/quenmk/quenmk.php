<form class="noidung_quenmk" action="" method="post">
        <div class="kiemtra">
            <h4>Đổi mật khẩu</h4>
            <div class="ktra">
                <div class="sdt">
                    <h5>Mật khẩu*</h5>
                    <input type="text" placeholder="PassWord" name="pass">
                    <br>
                    <br>
                    <span style="color: red;"><?php echo isset($password) ? $password : "" ?></span>
                </div>

                <div class="emai">
                    <h5>Xác nhận mật khẩu*</h5>
                    <input type="text" placeholder="Xác nhận pass" name="pass_again">
                    <br><br>
                    <span style="color: red;"><?php echo $password_again ?? $password_trung ?? ""; ?></span>
                </div>
            </div>
            <input id="dangky" type="submit" value="Đổi mật khẩu" name="doimatkhau">
            <button id="dangnhap"><a href="index.php?act=dangnhap">Đăng nhập</a></button>
        </div>
</form>
