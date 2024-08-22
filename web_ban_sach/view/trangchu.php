<div class="trangchu">
    <div class="banner_item">
        <div class="banner_item-item1">
            <a href="#"><img id="banner_trangchu" src="../web_ban_sach/img/banner/banner_trangchu/banner_item1.jpg" alt="" width="100%" height="100%"></a>
        </div>
        <div class="banner_item-item1">
            <a href="#"><img id="banner_trangchu" src="../web_ban_sach/img/banner/banner_trangchu/banner_item2.jpg" alt="" width="100%" height="100%"></a>
        </div>
        <div class="banner_item-item1">
            <a href="#"><img id="banner_trangchu" src="../web_ban_sach/img/banner/banner_trangchu/banner_item3.jpg" alt="" width="100%" height="100%"></a>
        </div>
    </div>

    <div class="view_product_one">
        <div class="view_product_one-name">
            <h5>FLASH SALE</h5>
        </div>
        <form class="product_item" action="index.php?act=chitietsanpham" method="post">
            <ul>
                <?php
                    foreach ($list_sp_giamgia as $key => $value) {
                        extract($value);
                        $hinh = $img_path . $image;?>
                        <li>
                            <button name="idsp" value="<?php echo $id; ?>" type="submit">
                                <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>">                    
                                    <div class="img">
                                        <img src="<?php echo $hinh ?>" alt="" width="100%" height="100%">
                                    </div>
                                    <h5><?php echo $name ?></h5>
                                    <div class="name_product"><?php echo $name_tap ?></div>
                                    <div class="price"><?php echo $discount; ?></div>
                                    <div class="old-price"><?php echo $price; ?></div>
                                </a>
                            </button>
                        </li>
                <?php }?>
            </ul>
        </form>
        <div class="seemore">
            <a href="index.php?act=sach" class="see_more">
                Xem Thêm
            </a>
        </div>
    </div>

    <div class="trangchu_noibat">
        <div class="trangchu_noibat-name">
            <h5>THƯƠNG HIỆU NỔI BẬT</h5>
        </div>
        <!-- Manga -->
        <form class="products" action="index.php?act=chitietsanpham" method="post">
            <div class="trangchu_noibat-namethuonghieu">
                <a href=""><h5>MANGA</h5></a>
            </div>
            <div class="trangchu_noibat_product_item">
                <ul>
                    <?php 
                        foreach ($list_sp_top10_manga as $key => $value) {
                            extract($value);
                            $hinh = $img_path . $image;
                            ?>
                            <li>
                                <button name="idsp" value="<?php echo $id; ?>" type="submit">                    
                                    <div class="img">
                                        <img src="<?php echo $hinh; ?>" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="name_product"><?php echo $name_tap; ?></div>
                                    <div class="price"><?php echo $price; ?> đ</div>
                                </button>
                            </li>
                    <?php }?>
                </ul>
            </div>
        </form>

        <!-- Tiểu Thuyết -->
        <form class="products" action="index.php?act=chitietsanpham" method="post">
            <div class="trangchu_noibat-namethuonghieu">
                <a href=""><h5>MANGA</h5></a>
            </div>
            <div class="trangchu_noibat_product_item">
                <ul>
                    <?php 
                        foreach ($list_sp_top10_manga as $key => $value) {
                            extract($value);
                            $hinh = $img_path . $image;
                            ?>
                            <li>
                                <button name="idsp" value="<?php echo $id; ?>" type="submit">                    
                                    <div class="img">
                                        <img src="<?php echo $hinh; ?>" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="name_product"><?php echo $name_tap; ?></div>
                                    <div class="price"><?php echo $price; ?> đ</div>
                                </button>
                            </li>
                    <?php }?>
                </ul>
            </div>
        </form>
    </div>
</div>
