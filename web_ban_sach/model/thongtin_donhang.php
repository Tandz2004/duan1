<?php 
function insert_diachi_giaohang($sdt_nhanhang, $quocgia, $tinh_thanhpho, $quanhuyen, $sonha_tenduong, $user_id){
    $sql = "INSERT INTO `diachi` (sdt_nhandonhang, quocgia, thanhpho, quanhuyen, nhacuthe, user_id)
    VALUES ('$sdt_nhanhang', '$quocgia', '$tinh_thanhpho', '$quanhuyen', '$sonha_tenduong', '$user_id')";
    pdo_execute($sql);
} 

function update_diachi($sdt_nhandonhang, $quocgia, $thanhpho, $quanhuyen, $nhacuthe, $user_id, $diachi_id){
    $sql = "UPDATE `diachi` SET `sdt_nhandonhang` = '{$sdt_nhandonhang}', `quocgia` = '{$quocgia}', `thanhpho` = '{$thanhpho}', `quanhuyen` = '{$quanhuyen}', `nhacuthe` = '{$nhacuthe}', `user_id` = '{$user_id}' WHERE `diachi`.`diachi_id` = '$diachi_id' ";
    pdo_execute($sql);
}

function laodone_diachi($iddc){
    $sql = "SELECT diachi.diachi_id, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe, diachi.user_id, user.username, user.email
    FROM `diachi`
    LEFT JOIN user ON diachi.user_id = user.user_id
    WHERE diachi.diachi_id = $iddc";

    $listkhachhang = pdo_query_one($sql);
    return  $listkhachhang;
}

function list_diachi(){
    $sql = "SELECT MAX(diachi_id) as max_diachi_id FROM diachi;";
    $listkhachhang = pdo_query_one($sql);
    return  $listkhachhang;
}