<div class="listkh">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">DANH SÁCH KHÁCH HÀNG</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
      <div class="row3mb10formds_loai">
        <br>
        <table border="1">
          <tr>
            <th></th>
            <th>MÃ KH</th>
            <th>HỌ VÀ TÊN</th>
            <th>ĐỊA CHỈ EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>VAI TRÒ</th>
            <th>CHỨC NĂNG</th>
          </tr>
          <?php foreach ($listkhachhang as $khachhang) {
            extract($khachhang); ?>
            <tr>
              <td><input type="checkbox" name="" id=""></td>
              <td><?php echo $user_id; ?></td>
              <td><?php echo $username; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $adress; ?></td>
              <td><?php echo $phone; ?></td>
              <td><?php echo $role_id; ?></td>
              <td>
                <a href="index.php?act=suakh&idkh=<?php echo $user_id; ?>"><input class="mr20" type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=xoakh&user_id=<?php echo $user_id; ?>"><input type="button" value="Xóa" name="xoakh"></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=addkh"><input class="mr20" type="button" value="Nhập thêm"></a>
      </div>
    </form>
  </div>
</div>
</div>