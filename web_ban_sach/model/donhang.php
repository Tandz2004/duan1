<?php 

// ====================User
function loadall_donhang($id){
    $sql = "SELECT chtiet_donhang.price_tra, product.image, product.name, product.name_tap
    FROM `chtiet_donhang`
    INNER JOIN product ON product.id = chtiet_donhang.id_pro
    WHERE chtiet_donhang.id_donhang = $id"; 
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_dh($id){
    $sql = "SELECT donhang.donhang_id, donhang.ngaydat, donhang.ghichu_dh, tinhtrang.name_tt
    FROM `donhang`
    INNER JOIN user ON user.user_id = donhang.id_user
    INNER JOIN tinhtrang ON tinhtrang.tinhtrang_id = donhang.tinhtrang
    WHERE user.user_id = $id";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function update_trangthai_donhang($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 4 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_cancel_donhang($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 5 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function chitiet_donhang($id_pro, $price_tra, $id_donhang)
{
    $sql = "INSERT INTO `chtiet_donhang` (`id_pro`, `price_tra`, `id_donhang`) VALUES ('$id_pro', '$price_tra', '$id_donhang')";
    pdo_execute($sql);
}

function loadall_id_pro($id){
    $sql = "SELECT product.id
    FROM `giohang`
    INNER JOIN chitiet_giohang ON chitiet_giohang.id_cart = giohang.giohang_id
    INNER JOIN product ON product.id = chitiet_giohang.id_pro
    WHERE giohang.giohang_id = $id";
    $listdiachi = pdo_query($sql);
    return  $listdiachi;
}



// ====================ADMIN
function loadall_donhang_admin(){
    $sql = "SELECT donhang.donhang_id, donhang.ngaydat, donhang.ghichu_dh, tinhtrang.name_tt
    FROM `donhang`
    INNER JOIN user ON user.user_id = donhang.id_user
    INNER JOIN tinhtrang ON tinhtrang.tinhtrang_id = donhang.tinhtrang";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}


function update_trangthai_donhang_2($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 2 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_trangthai_donhang_5($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 5 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}