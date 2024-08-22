<div class="danhmuc">
  <div class="row2font_title">
    <h2 style="font-size: 20px;">DANH SÁCH LOẠI DANH MỤC</h2>
  </div>
  <div class="row2form_content ">
    <form action="#" method="POST">
      <div class="row2mb10formds_danhmuc">
        <br>
        <table border="1">
          <tr>
            <th style="padding: 20px 10px 20px 10px;"></th>
            <th>MÃ DANH MỤC</th>
            <th>TÊN DANH MỤC</th>
            <th>CHỨC NĂNG</th>
          </tr>

            <tr>
            <?php foreach ($listdanhmuc as $danhmuc) {
            extract($danhmuc); ?>
             <td><input type="checkbox" name="" id=""></td>
              <td><?php echo $category_id; ?></td>
              <td><?php echo $category_name; ?></td>
              <td>
                <!-- <a href="index.php?act=suasp&idsp="><input type="button" value="Sửa"></a> -->
                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=xoadm&category_id=<?php echo $category_id; ?>"><input type="button" value="Xóa" name="xoasp"></a>
              </td>
            </tr>
            <?php } ?>
        </table>
      </div>
      <br>
      <div class="rowmb10">
        <button><a href="index.php?act=adddanhmuc">Nhập thêm</a></button>
      </div>
    </form>
  </div>
</div>
</div>