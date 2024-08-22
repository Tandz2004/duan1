
<form class="noidung_dangky" action="index.php?act=dangky" method="post">
    <article>
        <h5>Họ và tên*</h5>
        <input type="text" placeholder="UserName" name="username">
        <br>
        <br>
        <span style="color: red;"><?php echo isset($username) ? $username : ""; ?><br></span>

        <h5>Số điện thoại*</h5>
        <input type="text" placeholder="Số điện thoại" name="phone">
        <br>
        <br>
        <span style="color: red;"><?php echo $phone ?? $phone ?? ""; ?><br></span>

        <h5>Email*</h5>
        <input type="text" placeholder="Email của bạn" name="email">
        <br>
        <br>
        <span style="color: red;"><?php echo isset($email) ? $email : ""; ?><br></span>
        <br>
        <input id="dangky" type="submit" value="Đăng ký" name="dang_ky">
        <button id="dangnhap"><a href="index.php?act=dangnhap">Đăng nhập</a></button>
    </article>

    <aside>
        <h5>Mật khẩu*</h5>
        <input type="text" placeholder="Mật khẩu" name="password">
        <br>
        <br>
        <span style="color: red;"><?php echo $password ?? $password ?? "" ?></span>
        <br>

        <h5>Xác nhận mật khẩu*</h5>
        <input type="text" placeholder="Xác nhận mật khẩu" name="password_again">
        <br>
        <br>
        <span style="color: red;"><?php echo $password_again ?? $password_trung ?? ""; ?></span>
        <br>

        <h5>Nơi ở*</h5>
        <input type="text" placeholder="Nơi ở" name="dia_diem">
        <br>
        <br>
        <span style="color: red;"><?php echo isset($adress) ? $adress : "" ?></span>
    </aside>
</form>