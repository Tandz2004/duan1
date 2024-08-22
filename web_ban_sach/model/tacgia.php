<?php 
// Lấy dữ liệu bảng author
function loadall_tacgia(){
    $sql = "SELECT * FROM `author`";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// lấy dữ liệu bảng qua product_category_id
function product_author($idauthor){
    $sql = "SELECT * FROM `product` WHERE `product`.`author` = $idauthor";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}