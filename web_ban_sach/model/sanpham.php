<?php
// =================Trang chủ===================
// Lấy dữ liệu sản phẩm giảm giá theo $sl
function loadall_sanpham_giam_gia_theo_sl($sl){
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.author, product.page, product.format, product.weight, product.price, product.discount, product.luotthich
    FROM product
    WHERE product.discount IS NOT NULl
    ORDER BY product.luotthich DESC
    LIMIT 0, $sl";

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// Lấy dữ liệu sản phẩm top 10 lượt thích
function loadall_sanpham_top10_luothich_from_product_category()
{
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.author, product.page, product.format, product.weight, product.price, product.discount, product.luotthich
    FROM product
    ORDER BY product.luotthich DESC
    LIMIT 0, 10";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
// =================End Trang chủ===================


// =================Sản phẩm===================
// Lấy tất cả dữ liệu của 1 mục trong category
function loadall_sanpham_top20_luothich()
{
    $sql = "SELECT * FROM `product`
    ORDER BY luotthich DESC LIMIT 0,20";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_sanpham_top5_luothich()
{
    $sql = "SELECT * FROM `product`
    ORDER BY luotthich DESC LIMIT 0,5";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// lấy tát cả dữ liệu 1 mục trong product_category
function loadall_sanpham_product_category($id)
{
    $sql = "SELECT * FROM `product`
    WHERE product.category_id = '$id'
    LIMIT 0,20"; 
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
// =================End Sản phẩm===================



/// Update cột product_discount có dữ liệu 0.000 thành rỗng
function update_product_discount_trong (){
    $sql = "UPDATE product SET `product`.`discount` = NULL WHERE `product`.`discount` = '0.000'";

    pdo_execute($sql);
}

// lấy dữ liệu sanpham_top10_luothich_from_category
function loadall_sanpham_top10_luothich_from_category($id)
{
    $sql = "SELECT product.id, product.name, product.image, product.price, category.name FROM `product` , `category` WHERE category.id = '$id' ORDER BY luotthich DESC LIMIT 0,10";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_sanpham($keyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM `product` WHERE trangthai = 0";
    if ($keyw != "") {
        if ($keyw != "") {
            $sql .= " AND (
                (name LIKE '%" . $keyw . "%' OR name_tap LIKE '%" . $keyw . "%' OR price LIKE '%" . $keyw . "%') OR
                (name LIKE '%" . $keyw . "%' AND name_tap LIKE '%" . $keyw . "%' AND price LIKE '%" . $keyw . "%')
            )";            
        }        
    }
    if ($iddm > 0) {
        $sql .= " and name ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}


// Lấy dữ liệu 1 sản phẩm 
function loadone_sanpham($id)
{
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.page, product.format, product.weight, product.price, product.discount, product.luotthich, author.author_name
    FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

// Lấy dữ liệu 1 sản phẩm 
function loadone_sanpham_price($id)
{
    $sql = "SELECT product.price
    FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}

function insert_sanpham($tensanpham, $price, $img, $mota, $iddm)
{
    $sql = "INSERT INTO `sanpham` (`name`, `price`, `img`, `mota`, `iddm`) VALUES ('$tensanpham', '$price', '$img', '$mota', '$iddm')";
    pdo_execute($sql);
}

function updatesp($id, $iddm, $tensanpham, $price, $mota, $img)
{
    // Kiểm tra xem người dùng đã chọn hình ảnh mới hay không
    if ($_FILES['img']['name'] != "") {
        // Nếu họ đã chọn hình ảnh mới, thực hiện việc tải lên và cập nhật hình ảnh mới
        // $new_image = uploadImage(); // Hàm uploadImage() là hàm để tải lên hình ảnh mới
        // Thực hiện truy vấn SQL để cập nhật thông tin sản phẩm với đường dẫn hình ảnh mới
        $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}', `img` = '{$img}' WHERE `sanpham`.`id` = '$id' ";
        pdo_execute($sql);
    } else {
        // Nếu họ không chọn hình ảnh mới, sử dụng đường dẫn hình ảnh cũ để cập nhật
        $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}' WHERE `sanpham`.`id` = '$id' ";
        pdo_execute($sql);
    }
}

// Câu truy vấn xóa cứng
function hard_delete($id)
{
    $sql = "DELETE FROM `sanpham` WHERE `sanpham`.`id` = $id;";
    pdo_execute($sql);
}

// Câu truy vấn xóa mềm
function soft_delete($id)
{
    $sql = "UPDATE `sanpham` SET `trangthai` = 1 WHERE `sanpham`.`id` = '$id';";
    pdo_execute($sql);
}


// Lấy dữ liệu 0 đến 9 sản phẩm có id lớn nhất
// function loadall_sanpham_home()
// {
//     $sql = "select * from sanpham where 1 order by id desc limit 0,9";
//     $listsanpham = pdo_query($sql);
//     return  $listsanpham;
// }

// function loadall_sanpham($keyw = "", $iddm = 0)
// {
//     $sql = "SELECT *, COUNT(binhluan.id) as soBinhLuan
//             FROM sanpham 
//             JOIN binhluan on binhluan.idpro = sanpham.id
//             WHERE trangthai = 0
//             GROUP BY sanpham.id
//             ORDER BY sanpham.id DESC; ";
//     // where 1 tức là nó đúng
//     if ($keyw != "") {
//         $sql .= " and name like '%" . $keyw . "%'";
//     }
//     if ($iddm > 0) {
//         $sql .= " and iddm ='" . $iddm . "'";
//     }
//     $sql .= " order by id desc";
//     $listsanpham = pdo_query($sql);
//     return  $listsanpham;
// }
// 

// Lấy dữ liệu sanpham_from_product_category_id
// function loadall_sanpham_from_product_category_id($id)
// {
//     $sql = "SELECT product.id, product.name, product.name_tap, product.image, product.price, product.discount, product_category.product_category_name, product_category.product_category_id
//     FROM product
//     INNER JOIN product_category ON product.product_category_id = product_category.product_category_id
//     WHERE product.category_id = $id";
//     $listsanpham = pdo_query($sql);
//     return  $listsanpham;
// }


//=================Admin
function loadall_sanpham_admin($keyw = "", $iddm = 0)
{
    $sql = "SELECT *
    FROM `product` 
    INNER JOIN author ON author.author_id = product.author
    WHERE trangthai = 0";
    if ($keyw != "") {
        if ($keyw != "") {
            $sql .= " AND (
                (name LIKE '%" . $keyw . "%' OR name_tap LIKE '%" . $keyw . "%' OR price LIKE '%" . $keyw . "%') OR
                (name LIKE '%" . $keyw . "%' AND name_tap LIKE '%" . $keyw . "%' AND price LIKE '%" . $keyw . "%')
            )";            
        }        
    }
    if ($iddm > 0) {
        $sql .= " and name ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}