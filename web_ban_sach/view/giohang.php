<div class="giohang">
    <table>
        <tr>
            <th></th>
            <th>Truyện</th>
            <th class="dongia">Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        <?php
        if (isset($_SESSION['taikhoan'])) {
            foreach ($thongtingiohang as $key => $value) {
                $hinh                     = $img_path . $value['image'];
                $giohang_name             = $value['name'] . " " . $value['name_tap'];
                $_SESSION['idgh']         = $value['id_pro'];
            ?>
                <tr>
                    <td><img src="<?php echo $hinh; ?>" alt="" width="80px" height="110px"></td>
                    <td><?php echo $giohang_name; ?></td>
                    <td><div class="gia"><?php echo $value['price'];?></div></td>
                    <td>
                        <div class="tangsl">
                            <button name="giam" type="submit" class="giam-button">-</button>
                            <input name="soluonggiohang" class="giohangsl" type="text" value="<?php echo $value['soluong']; ?>" readonly>
                            <button name="tang" type="submit" class="tang-button">+</button>
                        </div>
                    </td>
                    <td><input class="tinh_tien" type="text" value="<?php echo $value['price'] * $value['soluong']; ?>.000" readonly></td>
                    <td>
                        <form class="xoagiohang" action="index.php?act=giohang" method="post">
                            <input class="xoa_sp_gh" name="xoa_sp_gh" type="submit" value="Xóa">
                        </form>
                    </td>
                </tr>
            <?php } }?>
    </table>


    <form class="khung_thanhtoan" action="index.php?act=thanhtoan" method="post">
        <?php 
            if (isset($thongtingiohang)) {?>
            <div class="thanhtoan">
                <div class="tong-gia">Tổng: <input class="tonggia" value="0" name="tonggia_gh"></div>
                <button name="thanhtoan_gh" class="buy_sp" type="submit" value="<?php echo $thongtingiohang[0]['giohang_id']; ?>"><a style="text-decoration: none;color: white;" href="index.php?act=thanhtoan&idgh=<?php echo $thongtingiohang[0]['giohang_id']; ?>">THANH TOÁN</a></button>
            </div>
        <?php }?>
    </form>
</div>
