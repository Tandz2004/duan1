<?php 
if (isset($_GET['user_id'])) {
    delete_khachhang($_GET['user_id']);
}
header("Location: index.php?act=listkh");