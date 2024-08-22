<?php
//==================User 
// =================Trang chủ===================
// Lấy dữ liệu bảng category
function category(){
    $sql = "SELECT * FROM `category`";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
// =================End Trang chủ===================

// =================Sản phẩm===================
// lấy dữ liệu bảng qua product_category_id
function product_category(){
    $sql = "SELECT * FROM `category`";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function insert_danhmuc($tendanhmuc)
{
    $sql = "INSERT INTO `danhmuc` (`name`) VALUES ('$tendanhmuc')";
    pdo_execute($sql);
}
// =================End Sản phẩm===================



//=====================Admin====================//

function insert_add_danhmuc($adddanhmuc)
{
    $sql = "INSERT INTO `category` (`category_name`) VALUES ('$adddanhmuc')";
    pdo_execute($sql);
}

function delete_danhmuc($id)
{
    $sql = "DELETE FROM `category` WHERE `category_id` = $id";
    pdo_execute($sql);
}