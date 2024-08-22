<?php 
function loadall_magiamgia()
{
    $sql = "SELECT * FROM magiamgia";
    $listkhachhang = pdo_query($sql);
    return  $listkhachhang;
}