<?php 
    if (isset($_COOKIE['doimk_yes'])) {
        echo "<script>alert('Đổi mật khẩu thành công!')</script>";
    }
?>
<form action="index.php?act=dangnhap" method="post" class="noidung_login">
    <article>
        <h4>Thông tin đăng nhập</h4>
        <h5>Email*</h5>
        <input type="text" placeholder="username" name="email">
        <br>
        <br>
        <span style="color: red;"><?php echo isset($error['email_drum']) ? $error['email_drum'] : ""; ?></span>

        <h5>Mật khẩu*</h5>
        <div class="khung_pass">
            <input type="password" placeholder="password" name="password" id="password">
            <span id="togglePassword" class="password-toggle">👁️</span>
        </div>
        <br>
        <span style="color: red;"><?php echo isset($error['pass_drum']) ? $error['pass_drum'] : ""; ?><br></span>

        <input id="dangnhap" type="submit" value="Đăng nhập" name="login">
        <br>
        <br>
        <?php if (isset($error['login_lost'])): ?>
            <span style="color: red;"><?php echo $error['login_lost']; ?></span>
            <br>
            <br>
        <?php endif; ?>
        <a href="index.php?act=ktra">Quên mật khẩu ?</a>
    </article>

    <aside>
        <h4>Bạn chưa có tài khoản ?</h4>
        <p>
            Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn ! <br>
            Ngoài ra còn có rất nhiều chính sách
            và ưu đãi cho các thành viên DuckBooks.
        </p>
        <button id="dangky"><a href="index.php?act=dangky">Đăng ký</a></button>
        <div class="bando">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29868.537976670537!2d106.36124527061146!3d20.6464888877112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135f2e57e7ab69d%3A0xcd09f20e080371e2!2zQW4gUXXDvSwgUXXhu7NuaCBQaOG7pSwgVGjDoWkgQsOsbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1699356661319!5m2!1svi!2s" width="100%" height="250px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </aside>
</form>
<script src="/web_ban_sach/js/togglePassword.js"></script>