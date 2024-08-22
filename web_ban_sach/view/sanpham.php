<div class="tong_sanpham">
    <article class="article">      
        <form action="index.php?act=sanpham" method="post">
            <div class="sanpham_search">
                <input name="name_sp_search" class="sanpham_search_input" type="text" value="" placeholder="V.d : tên sách, tên tác giả,..">
                <!-- <button name="timsanpham" class="sanpham_search_button" value="Search" type="submit">Search</button> -->
                <input name="timsanpham" class="sanpham_search_button" type="submit" value="Search">
            </div>

            <div class="danhmuc">
                <h3>Danh mục</h3>
                <?php foreach ($listdanhmuc as $danhmuc => $value) {
                    ?>
                    <!-- --------Danh mục 1------- -->
                    <div class="danhmuc_name">
                        <a class="ten_muc" href="index.php?act=sanpham&idprent=<?php echo $value[0] ?>"> <?php echo $value[1]; ?> </a>
                    </div>
                <?php } ?>
            </div>

            <div class="danhmuc">
                <h3>Theo Tác giả</h3>
                <?php foreach ($loadall_author as $danhmuc => $value) { ?>
                    <!-- --------Danh mục 1------- -->
                    <div class="danhmuc_name">
                        <a class="ten_muc" href="index.php?act=sanpham&idauthor=<?php echo $value[0] ?>"> <?php echo $value[1]; ?> </a>
                    </div>
                <?php } ?>
            </div>

            <div class="danhmuc">
                <h3>Top 5 ưa thích</h3>
                <?php foreach ($loadall_sanpham_top5_luothich as $danhmuc => $value) { ?>
                    <!-- --------Danh mục 1------- -->
                    <div class="danhmuc_name">
                        <a class="ten_muc" href="index.php?act=chitietsanpham&idsp=<?php echo $value['id']; ?>"> <?php echo $value['name'] . " - " .  $value['name_tap']; ?> </a>
                    </div>
                <?php } ?>
            </div>
        </form>
    </article>

    <aside>
        <form class="tong_sanpham" action="index.php?act=chitietsanpham" method="post">
            <?php
                if (isset($loadall_sanpham_product_category)) {
                    foreach ($loadall_sanpham_product_category as $key => $value) {
                        extract($value);
                        $hinh = $img_path . $image;
                        ?>
                        <button name="idsp" value="<?php echo $id; ?>" type="submit">
                            <div class="khungsanpham">
                                <div class="khungimg">
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><img src="<?php echo $hinh; ?>" alt=""></a>
                                </div>
                                
                                <div class="tensanpham">
                                    <h5><?php echo $name; ?></h5>
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><?php echo $name_tap; ?></a>
                                    <h6>Giá: <?php echo $price; ?> đ</h6>
                                </div>
                            </div>
                        </button>
                    <?php } 
                } else if(isset($loadall_sanpham_author)){
                    foreach ($loadall_sanpham_author as $key => $value) {
                        extract($value);
                        $hinh = $img_path . $image;
                        ?>
                        <button name="idsp" value="<?php echo $id; ?>" type="submit">
                            <div class="khungsanpham">
                                <div class="khungimg">
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><img src="<?php echo $hinh; ?>" alt=""></a>
                                </div>
                                
                                <div class="tensanpham">
                                    <h5><?php echo $name; ?></h5>
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><?php echo $name_tap; ?></a>
                                    <h6>Giá: <?php echo $price; ?> đ</h6>
                                </div>
                            </div>
                        </button>
                    <?php } 
                } else if(isset($loadallsp_timkiem)){
                    foreach ($loadallsp_timkiem as $key => $value) {
                        extract($value);
                        $hinh = $img_path . $image;
                        ?>
                        <button name="idsp" value="<?php echo $id; ?>" type="submit">
                            <div class="khungsanpham">
                                <div class="khungimg">
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><img src="<?php echo $hinh; ?>" alt=""></a>
                                </div>
                                
                                <div class="tensanpham">
                                    <h5><?php echo $name; ?></h5>
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><?php echo $name_tap; ?></a>
                                    <h6>Giá: <?php echo $price; ?> đ</h6>
                                </div>
                            </div>
                        </button>
                    <?php } 
                } else{
                    foreach ($loadall_sanpham_top20_luothich as $key => $value) {
                        extract($value);
                        $hinh = $img_path . $image;
                        ?>
                        <button name="idsp" value="<?php echo $id; ?>" type="submit">
                            <div class="khungsanpham">
                                <div class="khungimg">
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><img src="<?php echo $hinh; ?>" alt=""></a>
                                </div>
                                
                                <div class="tensanpham">
                                    <h5><?php echo $name; ?></h5>
                                    <a href="index.php?act=chitietsanpham&idsp=<?php echo $id; ?>"><?php echo $name_tap; ?></a>
                                    <h6>Giá: <?php echo $price; ?> đ</h6>
                                </div>
                            </div>
                        </button>
                    <?php }
                }?>
        </form>
    </aside>
</div>
</form>