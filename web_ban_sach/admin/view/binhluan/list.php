<div class="listbl">
  <div class="row2font_title">
    <h2 style="font-size: 20px;">DANH SÁCH BÌNH LUẬN</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
      <div class="row3mb10formds_binhluan">
        <br>
        <table border="1">
                    <tr>
                        <th style="padding: 20px 10px 20px 10px;"></th>
                        <th>MÃ BL</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>User Bình luận</th>
                        <th>HÌNH ẢNH</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>CHỨC NĂNG</th>
                    </tr>

                    <?php foreach ($listbinhluan as $binhluan) {
                        extract($binhluan); ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $comment_id; ?></td>
                            <td><?php echo $name . $name_tap; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><img src="../upload/<?php echo $image; ?>" alt="" width="80px" height="110px"></td>
                            <td><?php echo $commentText; ?></td>
                            <td><?php echo $thoigian; ?></td>
                            <td>
                                <!-- <a href="index.php?act=suasp&idsp=<?php echo $id; ?>"><input type="button" value="Sửa"></a> -->
                                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=delete_binhluan&comment_id=<?php echo $comment_id; ?>"><input type="button" value="Xóa" name="xoabl"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
      </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=bieudobl"><input class="mr20" type="button" value="BIỂU ĐỒ"></a>
      </div>
    </form>
  </div>
</div>
</div>