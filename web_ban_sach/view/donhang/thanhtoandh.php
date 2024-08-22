<form class="tt_and_hoantat" action="" method="post">
    <div class="thanhtoan">
        <div class="phuongthuc_thanh_toan">
            <h5>PHƯƠNG THỨC THANH TOÁN</h5>
            <br>
            <?php 
                foreach ($list_kieuthanhtoan as $key => $value) {
                    extract($value);?>
                        <input type="radio" name="thanhtoan" id="chuyenthuong" value="<?php echo $kieutt_id; ?>"> <?php echo $name; ?>
                        <br>
                        <br>
            <?php }?>
        </div>

        <div action="" method="post" class="khungadd_ghichu">
            <textarea class="viet_ghichu" name="ghichu" placeholder="Viết ghi chú"></textarea>
        </div>

        <input name="buy_now" type="submit" value="ĐẶT MUA">
    </div>

    <div class="hoantat">
        <!-- // Đơn hàng -->
        <?php 
            $tongGia = 0;
        if (isset($listsanpham)) {
                extract($listsanpham);
                $tongGia = $price + 30;
                
            ?>
                <div class="donhang1">
                    <h4>THÔNG TIN ĐƠN HÀNG</h4>
                    <h5><?php echo $name . " - " . $name_tap; ?></h5>
                    <h5>Giá :      <span style="color: chocolate; margin-left: 75px;font-size: 13px;"><?php echo $price; ?> đ</span></h5>
                    <h5>Phí vận chuyển  <span style="color: yellow; margin-left: 15px;font-size: 13px;">30.000 đ</span></h5>
                    <h5>Tổng cộng:      <input name="gia_end" style="margin-left: 38px;height: 35px;background-color: transparent;border: 0;color: red;font-size: 16px;" type="text" value="<?php echo $tongGia; ?>.000 đ" required></h5>
                </div>
        <?php }
        else if(isset($thongtingiohang)){?>
            <div class="donhang1">
                <h4>THÔNG TIN ĐƠN HÀNG</h4>
                <?php
                    // 0 là giá ban đầu + phí vận chuyển
                    $tongGia = 0 + 30; 
                    foreach ($giohang_thanhtoan as $key => $value) {
                        $tongGia += $value['price'] * $value['soluong'];?>
                        <h5><?php echo $value['name'] . " - " . $value['name_tap']; ?></h5>
                        <h5>Số tập :      <span style="color: chocolate; margin-left: 60px;font-size: 13px;"><?php echo $value['soluong']; ?></h5>
                        <h5>Giá 1 quyển :      <span style="color: chocolate; margin-left: 28px;font-size: 13px;"><?php echo $value['price']; ?> đ</h5>
                        <hr style="width: 50%;margin: 0;">
                    <?php }?>
                <br>
                <br>
                <hr style="width: 98%;margin: 0;">
                <h5>Phí vận chuyển  <span style="color: yellow; margin-left: 15px;font-size: 13px;">30.000 đ</span></h5>
                <h5>Tổng cộng:      <input name="gia_end" style="margin-left: 38px;height: 35px;background-color: transparent;border: 0;color: red;font-size: 16px;" type="text" value="<?php echo $tongGia; ?>.000 đ" required></h5>
                <hr>
            </div>
        <?php }?>

        <div class="giaohangden">
                <h4>THÔNG TIN GIAO HÀNG</h4>
                <br>
                SĐT nhận hàng  <input style="margin-left: 20px;height: 30px;padding-left: 10px;width: 200px;" type="text" name="phone_nh" id="" placeholder="số điện thoại">
                <br>
                <br>
                Quốc gia       <input style="margin-left: 62px;height: 30px;padding-left: 10px;width: 200px;" type="text" name="quocgia_nh" id="" placeholder="quốc gia">
                <br>
                <br>
                Thành phố      <input style="margin-left: 50px;height: 30px;padding-left: 10px;width: 200px;" type="text" name="thanhpho_nh" id="" placeholder="thành phố">
                <br>
                <br>
                Quận huyện     <input style="margin-left: 42px;height: 30px;padding-left: 10px;width: 200px;" type="text" name="quanhuyen_nh" id="" placeholder="quận huyện">
                <br>
                <br>
                Địa chỉ cụ thể <input style="margin-left: 30px;height: 30px;padding-left: 10px;width: 200px;" type="text" name="diachicuthe_nh" id="" placeholder="daichicuthe">
        </div>
    </div>
</form>
