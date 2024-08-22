<?php 
// lây địa chỉ
function loadone_diachi($user_id){
    $sql = "SELECT diachi.diachi_id, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe, diachi.user_id, user.username, user.email
    FROM `diachi`
    LEFT JOIN user ON user.user_id = diachi.user_id
    WHERE diachi.user_id = $user_id";

    $listdiachi = pdo_query($sql);
    return  $listdiachi;
}

function loadone_id_diachi(){
    $sql = "SELECT * FROM `donhang` ORDER BY `donhang_id` DESC LIMIT 1";
    $listdiachi = pdo_query_one($sql);
    return  $listdiachi;
}

function loadone_diachi_mua($id){
    $sql = "SELECT diachi.diachi_id, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe, diachi.user_id, user.username, user.email
    FROM `diachi`
    LEFT JOIN user ON user.user_id = diachi.user_id
    WHERE diachi.diachi_id = $id";

    $listdiachi = pdo_query($sql);
    return  $listdiachi;
}

function loadone_diachi_sdt_nhanhang($id){
    $sql = "SELECT diachi.diachi_id, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe, diachi.user_id, user.username, user.email
    FROM `diachi`
    LEFT JOIN user ON user.user_id = diachi.user_id
    WHERE diachi.sdt_nhandonhang = $id";

    $listdiachi = pdo_query_one($sql);
    return  $listdiachi;
}

function delete_diachi($id){
    $sql = "DELETE FROM diachi WHERE diachi_id = $id";
    pdo_execute($sql);
}


function loadone_sp_thanhtoan($id_user){
    $sql = "SELECT giohang.giohang_id, giohang.user_name_id, chitiet_giohang.ct_id, chitiet_giohang.id_cart, chitiet_giohang.price, chitiet_giohang.soluong, product.name, product.name_tap, product.price
    FROM `giohang`
    INNER JOIN `chitiet_giohang` ON chitiet_giohang.id_cart = giohang.giohang_id
    INNER JOIN `user` ON user.user_id = giohang.user_name_id
    INNER JOIN `product` ON product.id = chitiet_giohang.id_pro
    WHERE user.user_id = '$id_user';
    ";

    $listspthanhtoan = pdo_query($sql);
    return  $listspthanhtoan;
}

function loadone_sp($id){
    $sql = "SELECT * FROM product WHERE product.id = $id";
    $listsanpham = pdo_query_one($sql);
    return  $listsanpham;
}

function loadall_kieu_thanhtoan(){
    $sql = "SELECT * FROM `kieu_thanhtoan`";
    $list_kieuthanhtoan = pdo_query($sql);
    return  $list_kieuthanhtoan;
}

function donhang($diachi, $ghichu_dh, $kieu_thanhtoan, $tinhtrang, $user_id)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO `donhang` (`diachi`, `ghichu_dh`, `ngaydat` , `kieu_thanhtoan`, `tinhtrang`, `id_giohang`, `id_user`) VALUES ('$diachi', '$ghichu_dh', '$date', '$kieu_thanhtoan', '$tinhtrang', null, '$user_id')";
    pdo_execute($sql);
}

function donhang_giohang($diachi, $ghichu_dh, $kieu_thanhtoan, $tinhtrang, $id_giohang, $user_id)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO `donhang` (`diachi`, `ghichu_dh`, `ngaydat` , `kieu_thanhtoan`, `tinhtrang`, `id_giohang`, `id_user`) VALUES ('$diachi', '$ghichu_dh', '$date', '$kieu_thanhtoan', '$tinhtrang', '$id_giohang', '$user_id')";
    pdo_execute($sql);
}

function donhang_id($diachi, $price_tra, $ghichu_dh, $kieu_thanhtoan, $tinhtrang)
{
    $sql = "INSERT INTO `donhang` (`diachi`, `price_tra`, `ghichu_dh`, `kieu_thanhtoan`, `tinhtrang`, `id_giohang`) VALUES ('$diachi','$price_tra', '$ghichu_dh', '$kieu_thanhtoan', '$tinhtrang', null)";
    pdo_execute($sql);
}

// donhang_id	product_id	diachi	price_tra	ghichu_dh	kieu_thanhtoan	tinhtrang	user_id	giohang_id	

function sql_select_giohang($id_user){
    $sql = "SELECT giohang.giohang_id, giohang.user_name_id, chitiet_giohang.ct_id, chitiet_giohang.id_cart, chitiet_giohang.id_pro, chitiet_giohang.price, chitiet_giohang.soluong, product.name, product.name_tap, product.price
    FROM `giohang`
    INNER JOIN `chitiet_giohang` ON chitiet_giohang.id_cart = giohang.giohang_id
    INNER JOIN `user` ON user.user_id = giohang.user_name_id
    INNER JOIN `product` ON product.id = chitiet_giohang.id_pro
    WHERE user.user_id = $id_user";

    $listspthanhtoan = pdo_query($sql);
    return  $listspthanhtoan;
}

function delete_giohang($id){
    $sql = "DELETE FROM chitiet_giohang WHERE id_cart = $id";
    pdo_execute($sql);
}

