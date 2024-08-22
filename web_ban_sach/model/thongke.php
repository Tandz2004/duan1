<?php
// Câu lệnh thống kê
function load_thongke_sanpham_danhmuc()
{
    $sql = "SELECT dm.category_id, dm.category_name,
    COUNT(*) 'soluong', MIN(price) 'gia_min',
    MAX(price) 'gia_max', AVG(price) 'gia_avg'
    FROM category dm JOIN product sp on dm.category_id = sp.category_id 
    GROUP BY dm.category_id, dm.category_name
    ORDER BY soluong DESC";
    return pdo_query($sql);
}
