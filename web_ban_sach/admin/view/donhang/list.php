<div class="donhang">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">DANH SÁCH GIỎ HÀNG</h2>
  </div>
  <div class="row3form_content">
    <form action="index.php?act=donhang" method="post">
      <div class="row3mb10formds_donhang">
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Chức năng</th>
        </tr>

        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><input type="radio" name="id_donhang" id="" value="<?php echo $value['donhang_id'] ?>"></td>
                    <td><?php echo $value['name_tt'] ?></td>
                    <td><?php echo $value['ngaydat']?></td>
                    <td>
                        <?php 
                            if ($value['name_tt'] == 'Chờ xác nhận' && $value['name_tt'] != 'Chờ lấy hàng' && $value['name_tt'] != 'Đã hủy') {?>
                                <input name="xacnhandh"   type="submit" value="Xác Nhận">
                                <input name="xacnhan_huy"   type="submit" value="Hủy">
                        <?php } 
                            else if ($value['name_tt'] == 'Chờ lấy hàng' && $value['name_tt'] != 'Chờ xác nhận' && $value['name_tt'] != 'Đã hủy') {?>
                                <input name=""   type="submit" value="Đã xác nhận">
                        <?php } 
                            else if ($value['name_tt'] == 'Đang vận chuyển') {?>
                                <input name=""   type="submit" value="Đang vận chuyển">
                        <?php } 
                            else if ($value['name_tt'] == 'Đã nhận đơn hàng') {?>
                                <input name=""   type="submit" value="Đã nhận hàng">
                        <?php } 
                            else if ($value['name_tt'] == 'Đã hủy đơn') {?>
                                <input name=""   type="submit" value="Đã hủy">
                        <?php }?>  


                        <!-- <?php 
                            if ($value['name_tt'] == 'Chờ xác nhận' && $value['name_tt'] != 'Chờ lấy hàng') {?>
                                <input name="xacnhan_huy"   type="submit" value="Hủy">
                        <?php } 
                            else if ($value['name_tt'] != 'Chờ xác nhận' && $value['name_tt'] == 'Đã hủy') {?>
                                <input name=""   type="submit" value="Đã xác nhận">
                        <?php }?>   -->
                        
                        


                    </td>


                    <!-- <td>                 
                        <input name="xacnhandh"   type="submit" value="Xác Nhận">
                        <br>
                        <input name="xacnhan_huy" type="submit" value="Hủy">
                    </td> -->

                </tr>
          <?php } ?>

        </table>
      </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=bieudosp"><input class="mr20" type="button" value="THỐNG KÊ ĐƠN HÀNG"></a>
      </div>
    </form>
  </div>
</div>
</div>