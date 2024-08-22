<?php
function loadall_khachhang_home()
{
    $sql = "SELECT * FROM user WHERE 1 ORDER BY id DESC LIMIT 0,9";
    $listkhachhang = pdo_query($sql);
    return  $listkhachhang;
}
function loadall_khachhang_top10()
{
    $sql = "select * from user where 1 order by luotxem desc limit 0,10";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}
function loadall_khachhang($keyw = "", $idkh = 1)
{
    $sql = "SELECT * FROM `user` WHERE 1";
    // where 1 tức là nó đúng
    $listkhachhang = pdo_query($sql);
    return  $listkhachhang;
}

// 
function loadone_khachhang($id)
{
    $sql = "SELECT * FROM `user` WHERE user_id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_khachhang_cungloai($id, $iddm)
{
    $sql = "select * from taikhoan where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}







function insert_khachang($email,$user,$pass,$address,$tel){
    $sql="INSERT INTO `taikhoan` ( `email`, `user`, `pass`, `address`, `tel`) VALUES ( '$email', '$user','$pass','$address', '$tel'); ";
    pdo_execute($sql);
}

function updatekh($id, $user, $email, $pass, $address, $tel)
{
        $sql = "UPDATE `taikhoan` SET `user` = '{$user}', `email` = '{$email}', `pass` = '{$pass}', `address` = '{$address}', `tel` = '{$tel}' WHERE `taikhoan`.`id` = '$id' ";
        pdo_execute($sql);
}


//====================Admin=================//


function insert_khac_hang($username,$password,$email,$phone,$adress){
    $sql="INSERT INTO `user` ( `username`, `password`, `email`, `phone`, `adress`, `role_id`) VALUES ( '$username', '$password','$email','$phone', '$adress', 1); ";
    pdo_execute($sql);
}


function update_kh($user_id, $username, $password, $email, $phone, $adress)
{
        $sql = "UPDATE `user` SET `username` = '{$username}', `password` = '{$password}', `email` = '{$email}', `phone` = '{$phone}', `adress` = '{$adress}' WHERE `user`.`user_id` = '$user_id' ";
        pdo_execute($sql);
}

function delete_khach_hang($id)
{
    $spl="DELETE FROM `user` WHERE  `user`.`user_id` = $id";
    pdo_execute($spl);
}
