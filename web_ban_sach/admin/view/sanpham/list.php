<div class="row3">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">DANH SÁCH LOẠI HÀNG HÓA</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
      <div class="row3mb10formds_loai">
        <form action="index.php?act.listsp.php" method="post">
          <input class="nhap_sptimkiem" type="text" name="keyw" placeholder="tìm kiếm">
          <br>
          <br>
          <select class="loaisp" name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php foreach ($listdanhmuc as $danhmuc) {
              extract($danhmuc);
            ?>
              <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
            <?php } ?>
          </select>
          <input class="timkiem_sp" type="submit" name="clickok" value="Tìm kiếm" >
        </form>

        <br>
        <br>
        <table border="1">
          <tr>
            <th style="padding: 20px 10px 20px 10px;"></th>
            <th>MÃ SP</th>
            <th>TÊN SP</th>
            <th>Tập</th>
            <th>GIÁ</th>
            <th>HÌNH ẢNH</th>
            <th>TÁC GIẢ</th>
            <th>LƯỢT XEM</th>
            <th>CHỨC NĂNG</th>
          </tr>

          <?php foreach ($listsanpham as $sanpham) {
            extract($sanpham); ?>
            <tr>
              <td><input type="checkbox" name="" id=""></td>
              <td><?php echo $id; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $name_tap; ?></td>
              <td><?php echo $price; ?></td>
              <td><img src="../upload/<?php echo $image; ?>" alt="" width="100px" height="100px"></td>
              <td><?php echo $author_name; ?></td>
              <td><?php echo $luotthich; ?></td>
              <td>
                <a href="index.php?act=suasp&idsp=<?php echo $id;?>"><input type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=hard_delete&id=<?php echo $id;?>"><input type="button" value="Xóa cứng" name="xoasp"></a>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=soft_delete&id=<?php echo $id;?>"><input type="button" value="Xóa mềm" name="xoasp"></a>
              </td>
            </tr>
          <?php } ?>

        </table>
      </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=addsp"><input class="mr20" type="button" value="Nhập thêm"></a>
        <a href="index.php?act=bieudosp"><input class="mr20" type="button" value="BIỂU ĐỒ SẢN PHẨM"></a>
      </div>
    </form>
  </div>
</div>
</div>