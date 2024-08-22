<div class="thongke">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">THỐNG KÊ DANH MỤC SẢN PHẨM</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
        <div class="row3mb10formds_thongke">
            <br>
            <table border="1">
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ NHỎ NHẤT</th>
                    <th>GIÁ LỚN NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
                <?php 
                    foreach ($ds_thongke as $thongke) {
                    extract($thongke);?>
                        <tr>
                            <td><?php echo $category_id; ?></td>
                            <td><?php echo $category_name; ?></td>
                            <td><?php echo $soluong; ?></td>
                            <td>$ <?php echo $gia_min; ?></td>
                            <td>$ <?php echo $gia_max; ?></td>
                            <td>$ <?php echo number_format($gia_avg,2); ?></td>
                        </tr>
                <?php }?>
            </table>
        </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=bdthongke"><input class="mr20" type="button" value="BIỂU ĐỒ DANH MỤC SẢN PHẨM"></a>
      </div>
    </form>
  </div>
</div>
</div>