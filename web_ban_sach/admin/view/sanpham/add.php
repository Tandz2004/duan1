<div class="add_sanpham">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;">THÊM MỚI SẢN PHẨM</h2>
    </div>
    <div class="row2form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <hr>
            <br>
            <div class="add_sp">
                <div class="thongtin_sanpham">
                    <label> Tên sản phẩm </label> <br>
                    <input type="text" name="name_sp" placeholder="nhập vào tên sản phẩm">
                </div>
                <div class="thongtin_sanpham">
                    <label> Tên tập </label> <br>
                    <input type="text" name="name_tap" placeholder="nhập vào tên tập">
                </div>
                <div class="thongtin_sanpham">
                    <label> Số lượng </label> <br>
                    <input type="text" name="soluong" placeholder="nhập vào số lượng">
                </div>
                <div class="thongtin_sanpham">
                    <label>Hình ảnh </label> <br>
                    <input type="file" name="image_sp">
                </div>
                <div class="thongtin_sanpham">
                    <label> Số trang </label> <br>
                    <input type="number" name="page" placeholder="nhập vào số trang">
                </div>
                <div class="thongtin_sanpham">
                    <label> Định dạng </label> <br>
                    <input type="text" name="format" placeholder="nhập vào định dạng">
                </div>
                <div class="thongtin_sanpham">
                    <label> Trọng lượng </label> <br>
                    <input type="number" name="weight" placeholder="nhập vào trọng lượng">
                </div>
                <div class="thongtin_sanpham">
                    <label> Giá tiền </label> <br>
                    <input type="number" name="price" placeholder="nhập vào giá tiền">
                </div>
                <div class="thongtin_sanpham">
                    <label> Giá khuyến mãi </label> <br>
                    <input type="number" name="discount" placeholder="nhập vào giá khuyến mãi">
                </div>
                <div class="thongtin_sanpham">
                    <label> Tác giả </label> <br>
                    <input type="number" name="author" placeholder="nhập vào tác giả">
                </div>
                <div class="thongtin_sanpham">
                    <label>Mô tả</label> <br>
                    <textarea class="mota" name="mota" placeholder="nhập mô tả"></textarea>
                </div>
                <div class="thongtin_sanpham">
                    <label> Danh mục </label> <br>
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                        ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="nut_chucnang">
                <input class="mr20" type="submit" value="THÊM MỚI" name="themmoisp">
                <a href="index.php?act=sanpham"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>