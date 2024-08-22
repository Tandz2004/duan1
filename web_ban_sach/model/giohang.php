<?php 
//=================User
function insert_giohang($id_user)
{
    $sql = "INSERT INTO `giohang` (`user_name_id`) VALUES ('$id_user')";
    pdo_execute($sql);
}

function loadone_giohang($id){
    $sql = "SELECT * FROM `giohang`
    INNER JOIN user ON user.user_id = giohang.user_name_id
    WHERE giohang.user_name_id = $id";
    $listsanpham = pdo_query_one($sql);
    return  $listsanpham;
}

function loadone_chitiet_gh($idsp){
    $sql = "SELECT * FROM `chitiet_giohang` WHERE chitiet_giohang.id_pro = $idsp";
    $listsanpham = pdo_query_one($sql);
    return  $listsanpham;
}

function insert_chitietgiohang($id_cart, $id_pro, $price, $soluong)
{
    $sql = "INSERT INTO `chitiet_giohang` (`id_cart`, `id_pro`, `price`, `soluong`) VALUES ('$id_cart', '$id_pro', '$price', '$soluong')";
    pdo_execute($sql);
}

function loadall_giohang($id){
    $sql = "SELECT giohang.giohang_id, chitiet_giohang.id_cart, chitiet_giohang.id_pro, chitiet_giohang.price, chitiet_giohang.soluong, 
    product.name, product.name_tap, product.image, product.price
    FROM chitiet_giohang
    INNER JOIN product ON product.id = chitiet_giohang.id_pro
    INNER JOIN giohang ON giohang.giohang_id = chitiet_giohang.id_cart
    WHERE giohang.user_name_id = $id";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_giohang_sp($id){
    $sql = "SELECT giohang.giohang_id, chitiet_giohang.id_cart, chitiet_giohang.id_pro, chitiet_giohang.price, chitiet_giohang.soluong, 
    product.name, product.name_tap, product.image, product.price
    FROM chitiet_giohang
    INNER JOIN product ON product.id = chitiet_giohang.id_pro
    INNER JOIN giohang ON giohang.giohang_id = chitiet_giohang.id_cart
    WHERE chitiet_giohang.id_pro = $id";
    $listsanpham = pdo_query_one($sql);
    return  $listsanpham;
}

function loadall_giohang_idgh($id){
    $sql = "SELECT giohang.giohang_id, chitiet_giohang.id_cart, chitiet_giohang.id_pro, chitiet_giohang.price, chitiet_giohang.soluong, 
    product.name, product.name_tap, product.image, product.price
    FROM chitiet_giohang
    INNER JOIN product ON product.id = chitiet_giohang.id_pro
    INNER JOIN giohang ON giohang.giohang_id = chitiet_giohang.id_cart
    WHERE giohang.giohang_id = $id";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function update($soluong, $idsp){
    $sql = "UPDATE `chitiet_giohang` SET `chitiet_giohang`.`soluong` = $soluong WHERE `chitiet_giohang`.`id_pro` = $idsp";
    pdo_execute($sql);
}

function delete_sp_gh($id){
    $sql = "DELETE FROM `chitiet_giohang` WHERE `chitiet_giohang`.`id_pro` = $id";
    pdo_execute($sql);
}


//========================Admin
