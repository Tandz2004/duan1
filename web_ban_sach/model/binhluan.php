<?php

// ===============User
function loadall_binhluan($idsp)
{
    $sql = "SELECT comment.comment_id, comment.commentText, user.username, comment.thoigian 
    FROM `comment`
    LEFT JOIN user ON user.user_id = comment.user_id
    WHERE comment.product_id = $idsp";

    $result =  pdo_query($sql);
    return $result;
}
function insert_binhluan($user_id, $product_id, $commentText)
{
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `comment` (`user_id`, `product_id`, `commentText`, `thoigian`) 
            VALUES ('$user_id', '$product_id', '$commentText', '$date')";
    pdo_execute($sql);
}

// ================ADmin

function binhluan_sanpham()
{
    $sql = "SELECT comment.comment_id, comment.commentText, user.username, comment.thoigian, product.name, product.name_tap , product.image
    FROM `comment`
    LEFT JOIN user ON user.user_id = comment.user_id
    LEFT JOIN product ON product.id = comment.product_id";
    return pdo_query($sql);
}

// Xóa Bình luận
function delete_binhluan($id){
    $sql = "DELETE FROM `comment` WHERE `comment`.`comment_id` = $id;";
    pdo_execute($sql);
}