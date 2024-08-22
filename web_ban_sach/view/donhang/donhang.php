<form class="donhang" action="" method="post">
    <table>
        <tr>
            <th>ID</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Xem chi tiết</th>
            <th>Chức năng</th>
        </tr>

        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><input type="radio" name="id_donhang" id="" value="<?php echo $value['donhang_id'] ?>"></td>
                    <td><?php echo $value['name_tt'] ?></td>
                    <td><?php echo $value['ngaydat']?></td>
                    
                    <td><a href="index.php?act=chitietdonhang&iddh=<?php echo $value['donhang_id']; ?>">Xem</a></td>
                    <td>
                        <?php 
                            if ($value['name_tt'] == 'Chờ xác nhận' && $value['name_tt'] != 'Chờ lấy hàng' && $value['name_tt'] != 'Đã hủy') {?>
                                <input name="cancel_dh" type="submit" value="Hủy đơn hàng">
                        <?php } 
                            else if ($value['name_tt'] == 'Chờ lấy hàng' && $value['name_tt'] != 'Chờ xác nhận' && $value['name_tt'] != 'Đã hủy') {?>
                                <input name=""   type="submit" value="Đang lấy hàng">
                        <?php } 
                            else if ($value['name_tt'] == 'Đang vận chuyển') {?>
                                <input name=""   type="submit" value="Đang vận chuyển đến bạn">
                        <?php } 
                            else if ($value['name_tt'] == 'Đã nhận đơn hàng') {?>
                                <input name=""   type="submit" value="Đã nhận hàng">
                        <?php } 
                            else if ($value['name_tt'] == 'Đã hủy đơn') {?>
                                <input name=""   type="submit" value="Đã hủy">
                        <?php }?>  
                    </td>

                </tr>
        <?php }?>
    </table>
</form>