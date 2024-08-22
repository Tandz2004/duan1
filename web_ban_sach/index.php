<?php
session_start();
include "model/pdo.php";
require "model/taikhoan.php";
require "model/sanpham.php";
require "model/danhmuc.php";
require "model/binhluan.php";
require "model/tacgia.php";
require "model/giohang.php";
require "model/donhang.php";
require "model/thongtin_donhang.php";
require "model/thanhtoan.php";
require "model/magiamgia.php";

require "view/header.php";
require "view/validate/validate.php";
require "global.php";

// Điều kiện kiểm tra act
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];

    if ($act != "trangchu") {
        $dieuhuong = [
            "dangnhap"                  => "Đăng nhập",
            "dangky"                    => "Đăng ký",
            "ktra"                      => "Quên mật khẩu",
            "sanpham"                   => "Sản phẩm",
            "chitietsanpham"            => "Chi tiết sản phẩm",
            "giohang"                   => "Giỏ hàng",
            "tintuc"                    => "Tin tức",
            "donhang"                   => "Điền thông tin",
            "nhapthongtin_donhang"      => "Điền thông tin",
            "view_diachi"               => "Điền thông tin",
            "thanhtoan"                 => "Thanh toán và Hoàn tất",
            "thongbaodathang"           => "Đặt hàng thành công",
            "donhang"                   => "Quản lý đơn hàng",
        ];
        
        if (isset($dieuhuong[$act])) {
            $_SESSION['dieuhuong'] = $dieuhuong[$act];
        }
        include 'view/thanhdieuhuong.php';
    }
} 
else {
    // Nếu không có 'act' được xác định, đây là trang chủ
    $act = 'trangchu';
}

    switch ($act) {
        case "trangchu": 
            include 'view/shoping_box.php';
            require 'view/nav.php';
            include 'view/banner/banner_trangchu.php';

            if (isset($_SESSION['already_logged_in'])) {
                echo "<script>alert('Bạn đã đăng nhập rồi')</script>";
            }
            else{
                $list_sp_giamgia               = loadall_sanpham_giam_gia_theo_sl(4);
                $list_sp_top10_manga           = loadall_sanpham_top10_luothich_from_product_category();
                $_SESSION['listcategory']      = category();
            }

            include "view/trangchu.php";
            break;

        case "dangnhap":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['login']) && $_POST['login']) {
                $email                      = $_POST['email'];
                $pass                       = $_POST['password'];

                // Kiểm tra xem Người dùng có để trống ô không
                if (empty($email)) {
                    $error['email_drum'] = "*Vui lòng không để trống Email";
                }

                if (empty($pass)) {
                    $error['pass_drum'] = "*Vui lòng không để trống PassWord";
                }

                //Nếu Không cos lỗi thì cho đăng nhập
                if (!isset($error)) {
                    $taikhoan       = dangnhap($email, $pass);
                    // echo "<pre>";
                    // print_r($taikhoan);
                    // die;
                    if (is_array($taikhoan)) {
                        $_SESSION['taikhoan'] = $taikhoan;
                        $thong_bao      = "Dang nhap thanh cong";
                        // Chuyen huong trang chu hoac admin
                        if (in_array($taikhoan['role_id'], [2, 3, 4])) {
                            header("Location: admin/index.php?act=trangchu");
                        }else {
                            header("Location: index.php?act=trangchu");
                        }
                    }else {
                        $error['login_lost'] = "*Thông tin đăng nhập sai!";
                    }
                }
            }
            include "view/taikhoan/login/login.php";
            break;

        case "dangky":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in']   = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['dang_ky']) && $_POST['dang_ky']) {
                    $email_dk                    =  $_POST['email'];
                    $password_dk                 =  $_POST['password'];
                    $password_again_dk           =  $_POST['password_again'];
                    $username_dk                 =  $_POST['username'];
                    $phone_dk                    =  $_POST['phone'];
                    $adress_dk                   =  $_POST['dia_diem'];

                    //Lấy dữ liệu từ database về để kiểm tra xem Email, SĐT đã tông tại chưa
                    $list_user_email             = load_user_email($email_dk);
                    $list_user_phone             = load_user_phone($phone_dk);

                    // Validate Email
                    $validateemail               = validateEmail($email_dk, $list_user_email);
                    extract($validateemail);

                    // Validate Phone
                    $validatephone               = validatePhone($phone_dk, $list_user_phone);
                    extract($validatephone);

                    // Validate Password
                    $validatepass                = validatePass($password_dk);
                    extract($validatepass);

                    // Validate PassWord_again
                    $validatepass_again          = validateRepass($password_again_dk);
                    extract($validatepass_again);

                    $validate_passtrung          = validate_pass_trung($password_dk, $password_again_dk);
                    extract($validate_passtrung);

                    // Validate UserName
                    $validate_name               = validateName($username_dk);
                    extract($validate_name);

                    // Validate Adress
                    $validateadress              = validateAddress($adress_dk);
                    extract($validateadress);
                    //End Validate

                    // Kiểm tra xem có lỗi không
                    if (count($validateemail) == 0 && count($validatephone) == 0 && count($validatepass) == 0 && count($validatepass_again) == 0 && count($validate_passtrung) == 0 && count($validate_name) == 0 && count($validateadress) == 0) {
                        // Nếu không có lỗi ở cả hai kiểm tra, thì cho phép đăng ký tài khoản
                        insert_taikhoan($email_dk, $username_dk, $password_dk, $phone_dk, $address_dk);
                        $_SESSION['dangky_tk_yes'] = "Đăng ký thành công!";
                        header("refresh: 2; url=index.php?act=dangnhap");
                    }             
                }
            include "view/taikhoan/dangky/dangky.php";
            break;

        case "dangxuat":
            dangxuat();
            header("Location: index.php?act=trangchu");
        break;

        case "ktra":
            $error = array();

            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['kiemtra']) && $_POST['kiemtra']) {
                $phone_forgot                  = $_POST['phone'];
                $email_forgot                  = $_POST['email'];

                if (empty($phone_forgot)) {
                    $error['phone']            = "*Vui lòng không để trống SĐT!";
                }

                if (empty($email_forgot)) {
                    $error['email']            = "*Vui lòng không để trống Email!";
                }

                if (isset($error)) {
                    $list_forgot               = quenmk($email_forgot, $phone_forgot);
                    if (is_array($list_forgot)) {
                        extract($list_forgot);
                        header("Location: index.php?act=quen_mk&id=$user_id");
                    }
                }
            }
            
            include "view/taikhoan/quenmk/kiemtra.php";
            break;

        case "quen_mk":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['doimatkhau']) && $_POST['doimatkhau']) {
                $pass_forgot                    = $_POST['pass'];
                $pass_again_forgot              = $_POST['pass_again'];
                $id                             = $_GET['id'];

                $validatepass = validatePass($pass_forgot);
                extract($validatepass);

                $validatepass_again = validateRepass($pass_again_forgot);
                extract($validatepass_again);

                $validatepass_trung = validate_pass_trung($pass_forgot, $pass_again_forgot);
                extract($validatepass_trung);

                if (count($validatepass) == 0 && count($validatepass_again) == 0 && count($validatepass_trung) == 0) {
                    // Nếu không có lỗi ở cả hai kiểm tra, thì cho phép đăng ký tài khoản
                    update_mk($pass_forgot, $id);
                    setcookie('doimk_yes', "Đổi mật khẩu thành công!", time() + 5);
                    header("Location: index.php?act=dangnhap");
                }
            }
            include "view/taikhoan/quenmk/quenmk.php";
            break;

        case "sanpham":
            $listdanhmuc                              = product_category();

            $loadall_sanpham_top20_luothich           = loadall_sanpham_top20_luothich();
            $loadall_sanpham_top5_luothich            = loadall_sanpham_top5_luothich();
            $loadall_author                           = loadall_tacgia();  
            // nếu tồn tại name = iddm thì =>

            if (isset($_GET['idprent'])) {
                $idprent                          = $_GET['idprent'];
                $loadall_sanpham_product_category = loadall_sanpham_product_category($idprent);
            }

            if (isset($_GET['idauthor'])) {
                $idauthor                         = $_GET['idauthor'];
                $loadall_sanpham_author           = product_author($idauthor);
            }

            if (isset($_POST['timsanpham'])) {
                $name_sp_search    = $_POST['name_sp_search'];
                $loadallsp_timkiem = loadall_sanpham($name_sp_search,);
            }
            
            include "view/sanpham.php";
            break;

        case "chitietsanpham":
            if (isset($_POST['idsp']) && $_POST['idsp']) {
                $idsp                                   = $_POST['idsp'];
            }else{
                $idsp = $_SESSION['id'];
            }
            // Lưu lại id load lại khi bình luận xong
            $_SESSION['id']                       = $idsp;
            $sanpham_chitiet                      = loadone_sanpham( $_SESSION['id']);
            $list_comment                         = loadall_binhluan( $_SESSION['id']);

            // Nếu tồn tại name = add_bl =>
            if(isset($_POST['add_bl']) && $_POST['add_bl']){
                // Nếu tồn tại $session['taikhoan] thì =>
                if (isset($_SESSION['taikhoan'])) {
                    $commentText                  = $_POST['binhluan'];
                    $product_id                   =  $_SESSION['id'];
                    $user_id                      = $_SESSION['taikhoan']['user_id'];
                    insert_binhluan($user_id, $product_id, $commentText);
                    header("Location: index.php?act=chitietsanpham");
                }
                else {
                    echo "<script>alert('Bạn phải đăng nhập trước')</script>";
                    header("refresh: 1, url='index.php?act=dangnhap");
                }
            }

            // Thêm sản phẩm vào giỏ hàng
            if (isset($_POST['add_gh']) && $_POST['add_gh']) {
                    header("Location: index.php?act=giohang");
            }

            if(isset($_POST['buy_sp'])){
                header("Location: index.php?act=thanhtoan");
            }
            include "view/chitietsanpham.php";
            break;

        case 'giohang':
            if (isset($_SESSION['taikhoan'])) {
                $iduser       = $_SESSION['taikhoan']['user_id'];
                // Nếu không tồn tại giỏ hàng cho người dùng, thì tạo mới
                // Dữ liệu giỏ hàng theo iduser
                $listgh = loadone_giohang($iduser);
                if (!is_array($listgh)) {
                    $id_cart = insert_giohang($iduser);
                } 
                else {
                    $id_cart = $listgh['giohang_id'];
                }
                // Lấy thông tin sản phẩm từ form hoặc từ bất kỳ nguồn dữ liệu nào đó
                if (isset($_POST['idsp'])) {
                    $id_pro        = $_POST['idsp'];
                    $soluong       = $_POST['soluong'];

                    
                    // Kiểm tra xem $idsp có tồn tại trong giỏ hàng không
                    $soluong_ctdh  = loadone_chitiet_gh($iduser);
                    // Lấy giá tiền theo idsp
                    $thogntinsp_id = loadall_giohang_sp($id_pro);   
                    if (is_array($thogntinsp_id) && isset($thogntinsp_id['giohang_id']) && isset($thogntinsp_id['soluong'])) {
                        // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                        $soluong = $soluong + $thogntinsp_id['soluong'];
                        update($soluong, $id_pro);
                    } else {
                        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
                        $sanpham_info = loadone_sanpham($id_pro); // Lấy thông tin sản phẩm để lấy giá
                        $price = $sanpham_info['price']; // Giả sử giá sản phẩm lấy được từ thông tin sản phẩm
                    
                        // Trong trường hợp này, bạn cần có thông tin giỏ hàng, chẳng hạn như id_cart
                        // Bạn có thể thực hiện load giỏ hàng từ csdl hoặc tạo mới nếu không tồn tại
                        // $id_cart = // Lấy thông tin giỏ hàng
                        insert_chitietgiohang($id_cart, $id_pro, $price, $soluong);
                    }  
                }
                $iduser  = $_SESSION['taikhoan']['user_id'];
                // Hiển thị thông tin giỏ hàng
                $thongtingiohang = loadall_giohang($iduser);

                if (isset($_POST['xoa_sp_gh']) && $_POST['xoa_sp_gh']) {
                    $idgh = $_SESSION['idgh'];
                    delete_sp_gh($idgh);
                }
            } 



            if (isset($_POST['thanhtoan_gh'])) {
                $tonggia_gh = $_POST['tonggia_gh'];
                $soluong    = $_POST['soluonggiohang'];
                header("Location: index.php?act=thanhtoan");
            }
            include "view/giohang.php";
            break;       



        case 'thanhtoan':
            // Lấy thông tin kiểu thanh toán
            $list_kieuthanhtoan = loadall_kieu_thanhtoan();
            // Xử lý thanh toán giỏ hàng
            if (isset($_POST['thanhtoan_gh']) && $_POST['thanhtoan_gh']) {
                $idgiohang = $_POST['thanhtoan_gh'];
                $thongtingiohang = loadall_giohang_idgh($idgiohang);
            } else if(isset($_GET['idgh']) && $_GET['idgh']){
                $idgiohang = $_GET['idgh'];
                $thongtingiohang = loadall_giohang_idgh($idgiohang);
            }

            // Xử lý mua sản phẩm
            if (isset($_POST['buy_sp']) && $_POST['buy_sp']){
                $thongtinsp_id = $_POST['buy_sp'];
                $listsanpham = loadone_sanpham($thongtinsp_id);
            } else if(isset($_GET['idsp']) && $_GET['idsp']){
                $thongtinsp_id = $_GET['idsp'];
                $listsanpham = loadone_sanpham($thongtinsp_id);
            }

            // lấy dữ liệu người dùng
            if(isset($_SESSION['taikhoan']) && $_SESSION['taikhoan']){
                $id_user               = $_SESSION['taikhoan']['user_id'];
                // Lấy thông tin giỏ hàng thông qua $id_user
                $giohang_thanhtoan  = loadone_sp_thanhtoan($id_user);
                if (isset($_POST['buy_now']) && $_POST['buy_now']) {
                    $ghichu_dh      = $_POST['ghichu']; 
                    $sdt            = $_POST['phone_nh'];
                    $quocgia        = $_POST['quocgia_nh'];
                    $thanhpho       = $_POST['thanhpho_nh'];
                    $quanhuyen      = $_POST['quanhuyen_nh'];
                    $diachucuthe    = $_POST['diachicuthe_nh'];
                    $user_id        = $_SESSION['taikhoan']['user_id'];
                    if (!empty($sdt) && !empty($quocgia) && !empty($thanhpho) && !empty($quanhuyen) && !empty($diachucuthe) && !empty($user_id)) {
                        insert_diachi_giaohang($sdt, $quocgia, $thanhpho, $quanhuyen, $diachucuthe, $user_id);
                        $diachigiaohang = loadone_diachi_sdt_nhanhang($sdt);
                        $diachi = $diachigiaohang['diachi_id'];
                    } else{
                        echo "<script>alert('Thông tin nhận hàng ko để trống!!')</script>";
                    }
                    $price_tra      = $_POST['gia_end'];
                    // Loại bỏ ký tự '.' và 'đ' từ giá trị
                    $price_tra = str_replace('.000', '', $price_tra); // loại bỏ dấu phẩy ngăn cách phần nghìn
                    $price_tra = str_replace(' đ', '', $price_tra);
                    // Chuyển đổi giá trị sang kiểu số
                    $price_tra = intval($price_tra);
                    // Kiểm tra giá trị mới
                    // echo $price_tra;

                    // $product_id     = $sp_thanhtoan['id'];
    
                    $kieu_thanhtoan = $_POST['thanhtoan'];
                    // Thêm đơn hàng
                    if(isset($_GET['idsp']) && $_GET['idsp']){
                        donhang($diachi, $ghichu_dh, $kieu_thanhtoan, 1, $user_id);
                        $listdh_id_diachi = loadone_id_diachi();
                    } 
                    else if(isset($_GET['idgh']) && $_GET['idgh']){
                        $giohang_thanhtoan  = loadone_sp_thanhtoan($user_id);
                        $id_gh = $giohang_thanhtoan[0]['giohang_id'];
                        $listdh_id_diachi = loadone_id_diachi();
                        donhang_giohang($diachi, $ghichu_dh, $kieu_thanhtoan, 1, $id_gh, $user_id);
                    }

                    // Thêm chi tiết đơn hàng
                    if (isset($_GET['idsp'])) {
                        $id_donhang  =  $listdh_id_diachi['donhang_id'];
                        $id_pro      = $_GET['idsp'];
                        chitiet_donhang($id_pro, $price_tra, $id_donhang);
                        header("Location: index.php?act=thongbaodathang");  
                    } 
                
                    if(isset($_GET['idgh']) & $_GET['idgh']){
                        $id_donhang  =  $listdh_id_diachi['donhang_id'];
                        $id  = $_GET['idgh'];
                    
                        $listsp = loadall_id_pro($id);
                        $inputArray = array();
                        foreach ($listsp as $key => $value) {
                            $inputArray[] = array('id' => $value[0], 0 => $value[0]);
                        }
                    
                        // Hiển thị mảng mới
                        // echo "<pre>";
                        // print_r($inputArray);
                    
                        // Duyệt qua mảng và thực hiện insert
                        foreach ($inputArray as $item) {
                            $id_pro = $item[0];
                            $price_tra = $_POST['gia_end'];
                    
                            // Thực hiện insert
                            chitiet_donhang($id_pro, $price_tra, $id_donhang);
                        }
                    
                        header("Location: index.php?act=thongbaodathang");
                        exit();                     
                    }                     
                }          
            }
            
            include "view/donhang/thanhtoandh.php";
            break;

        case 'thongbaodathang':
            include "view/donhang/dathangthanhcong.php";
            break;


        case 'donhang':
            $iduser      = $_SESSION['taikhoan']['user_id'];
            $listdonhang = loadall_dh($iduser);
            
            if (isset($_POST['trangthai_dh'])) {
                $id_confirm = $_POST['id_donhang'];
                update_trangthai_donhang($id_confirm);
                header("Location: index.php?act=donhang");
            }

            if (isset($_POST['cancel_dh'])) {
                $id_cancel = $_POST['id_donhang'];
                update_cancel_donhang($id_cancel);
                header("Location: index.php?act=donhang");
            }
            include "view/donhang/donhang.php";
            break;


        case 'chitietdonhang':
            $iddh = $_GET['iddh'];
            $listdonhang           = loadall_donhang($iddh);
            include "view/donhang/chitietdonhang.php";
            break;


        case 'tintuc':
            include 'view/banner/banner_tintuc.php';
            include "view/tintuc.php";
            break;
    }
    require 'view/footer.php';

