<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/khachhang.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/donhang.php";

include "view/header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {


            // Trang chủ
        case 'trangchu':
            include "trangchu/list.php";
            break;


            // Danh mục
        case 'danhmuc':
            $listdanhmuc = product_category();
            include "view/danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['category_id'])) {
                delete_danhmuc($_GET['category_id']);
            }
            $listdanhmuc = product_category();
            include "view/danhmuc/list.php";
        break;

            // Danh mục
        case 'adddanhmuc':
            $listdanhmuc = product_category();
            if (isset($_POST['themmoidm']) && $_POST['themmoidm']) {
                if (empty($_POST['category_name'])) {
                    $error['chuanhapdanhmuc'] = 'chuanhap';
                } else {
                    $adddanhmuc = $_POST['category_name'];
                    insert_add_danhmuc($adddanhmuc);
                    header("Location: index.php?act=danhmuc");
                }
            } else {
                $category_name = "";
            }
            include "view/danhmuc/add.php";
            break;

            // Sản phẩm
        case 'sanpham':
            if (isset($_POST['clickok']) && $_POST['clickok']) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }

            $listdanhmuc = product_category();
            $listsanpham = loadall_sanpham_admin($keyw, $iddm);
            include "view/sanpham/list.php";
            break;

            // Sản phẩm
        case 'addsp':
            $listdanhmuc = product_category();
            // Thêm sản phẩm
            if (isset($_POST['themmoisp']) && $_POST['themmoisp']) {
                $iddm           = $_POST['iddm'];
                $tensanpham     = $_POST['tensanpham'];
                $price          = $_POST['price'];
                // $img         = $_FILES['img'];
                $mota           = $_POST['mota'];
                $error = "";

                // Kiểm tra xem đã nhập đủ chưa
                if (empty($tensanpham)) { // email trống
                    $error['tensanpham'] = "Bạn không được để trống tên sản phẩm";
                }
                if (empty($price)) {
                    $error['price'] = "Bạn không được để trống giá tiền";
                }
                if (empty($mota)) {
                    $error['mota'] = "Bạn không được để trống mô tả";
                }

                // Thêm ảnh vào Foder Uploat
                if (isset($_FILES['img']) && $_FILES['img']) {
                    //thư mục sẽ lưu ảnh
                    $target_dir = "../upload/";
                    // lấy tên của hình ảnh
                    $name_img = $_FILES["img"]["name"];
                    // tạo ra 1 biến ghép đường dẫn của thư mục với tên hình ảnh
                    $target_file = $target_dir . $name_img;
                    //di chuyển hình ảnh vào thư mục
                    move_uploaded_file($_FILES["img"]['tmp_name'], $target_file);
                }


                if (!$error) {
                    insert_sanpham($tensanpham, $price, $name_img, $mota, $iddm);
                    $themthanhcong = "thành công";

                    echo "<script>alert('Thêm sản phẩm thành công')</script>";
                }
            }
            include "view/sanpham/add.php";
            break;

            case 'bieudosp':
            $listsanpham = loadall_sanpham();
            // echo "<pre>";
            // print_r($listsanpham);
            // die;
            include "sanpham/bieudo.php";
            break;

            // Sửa sản phẩm
        case 'suasp':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sanpham = loadone_sanpham($_GET['idsp']);
            }
            $listdanhmuc = product_category();
            include "view/sanpham/update.php";
            break;

            // Update sản phẩm
        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $iddm           =   $_POST['iddm'];
                $id             =   $_POST['idkh'];
                $tensanpham     =   $_POST['tensanpham'];
                $price          =   $_POST['price'];
                $mota           =   $_POST['mota'];
                $img            =   $_FILES['img']['name'];
                $target_dir     =   "../upload/";
                $target_file    =   $target_dir . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                updatesp($id, $iddm, $tensanpham, $price, $mota, $img);
            }
            $listdanhmuc = product_category();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case 'hard_delete':
            // Xóa sản phẩm
            if (isset($_GET['id'])) {
                hard_delete($_GET['id']);
            }

            $listdanhmuc = product_category();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case 'soft_delete':
            if (isset($_GET['id'])) {
                soft_delete($_GET['id']);
            }
            $listdanhmuc = product_category();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

            // ----------------------Hết Sản phẩm---------------------------

            // ------------------------Danh mục----------------------------
        case "loaihang":
            $list_danhmuc = product_category();
            include "danhmuc/list.php";
            break;

        case 'addlh':
            if (isset($_POST['themmoidm']) && $_POST['themmoidm']) {
                if (empty($_POST['tendanhmuc'])) {
                    $error['chuanhapdanhmuc'] = 'chuanhap';
                } else {
                    $tendanhmuac = $_POST['tendanhmuc'];
                    insert_danhmuc($tendanhmuac);
                    header("Location: index.php?act=loaihang");
                }
            }
            include "danhmuc/add.php";
            break;

            // --------------------------Hàng hóa---------------------------

        case "hanghoa":
            include "hanghoa/list.php";
            break;




            //======================== Khách hàng==========================
        case "listkh":
            $listkhachhang = loadall_khachhang();
            include "view/khachhang/list.php";
            break;

        case "addkh":
            if (isset($_POST['addkh']) && ($_POST['addkh'] != "")) {   
                $user_name           = $_POST['username'];
                $pass_word           = $_POST['password'];
                $ema_il              = $_POST['email'];
                $pho_ne              = $_POST['phone'];
                $ad_ress             = $_POST['adress'];
                insert_khac_hang($user_name, $pas_sword, $ema_il, $pho_ne, $ad_ress);
                header("Location: index.php?act=listkh");
            }
        
            include "view/khachhang/add.php";
            break;

        case 'suakh':
            if (isset($_GET['idkh']) && $_GET['idkh'] > 0) {
                $khachhang = loadone_khachhang($_GET['idkh']);
            }
            include "view/khachhang/update.php";
            break;

        case 'updatekh':
            if (isset($_POST['suakh']) && $_POST['suakh']) {
                $user           =   $_POST['username'];
                $email          =   $_POST['email'];
                $id             =   $_GET['user_id'];
                $pass           =   $_POST['password'];
                $address        =   $_POST['adress'];
                $tel            =   $_POST['phone'];
                update_kh($id, $user, $email, $pass, $address, $tel);
                header("Location: index.php?act=listkh");
            }
            $listkhachhang = loadall_khachhang();
            include "view/khachhang/list.php";
            break;

        case 'xoakh':
            if (isset($_GET['user_id'])) {
                delete_khach_hang($_GET['user_id']);
            }
            $listkhachhang = loadall_khachhang();
            include "view/khachhang/list.php";
            break;

            // ----------------------Hết Khách hàng---------------------------

// =
// =
// =
// =
// =

            // ----------------------Bình luận--------------------------------
        case "binhluan":
            $listbinhluan = binhluan_sanpham();
            include "view/binhluan/list.php";
            break;


            
        case "bieudobl":
            $listbinhluan = binhluan_sanpham();
            include "view/binhluan/bieudo.php";
            break;


        case 'delete_binhluan':
                if (isset($_GET['comment_id'])) {
                    delete_binhluan($_GET['comment_id']);
                }
            
           
            $listbinhluan = binhluan_sanpham();
            include "view/binhluan/list.php";
            break;


            // ----------------------Bình luận--------------------------------
        case "donhang":
            $listdonhang = loadall_donhang_admin();
            // echo "<pre>";
            // print_r($listdonhang);
            // die;
            if (isset($_POST['xacnhandh'])) {
                $id = $_POST['id_donhang'];
                update_trangthai_donhang_2($id);
                header("Location: index.php?act=donhang");
            }

            if (isset($_POST['xacnhan_huy'])) {
                $id = $_POST['id_donhang'];
                echo $id;
                update_trangthai_donhang_5($id);
                header("Location: index.php?act=donhang");
            }
            include "view/donhang/list.php";
            break;


            // ----------------------Thống kê--------------------------------
        case "thongke":
            $ds_thongke = load_thongke_sanpham_danhmuc();
            // echo "<pre>";
            // print_r($ds_thongke);
            // die;
            include "view/thongke/list.php";
            break;

        case "bdthongke":
            $ds_thongke = load_thongke_sanpham_danhmuc();
            include "view/thongke/bieudo.php";
            break;
    }
} else {
    include "view/sanpham/list.php";
}
include "view/footer.php";
