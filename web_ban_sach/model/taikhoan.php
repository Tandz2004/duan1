<?php
// session_start();

//dang ky
function insert_taikhoan($email, $username, $password, $phone, $adress)
{
    $sql = "INSERT INTO `user` ( `email`, `username`, `password`, `phone`, `adress`, `role_id`) VALUES ( '$email', '$username','$password', '$phone', '$adress', 1); ";
    pdo_execute($sql);
}

// Hàm kiểm tra sự tồn tại của email trong cơ sở dữ liệu
function load_user_email($email)
{
    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

// Hàm kiểm tra sự tồn tại của email trong cơ sở dữ liệu
function load_user_phone($phone)
{
    $sql = "SELECT * FROM `user` WHERE phone='$phone'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan($keyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM user WHERE 1";
    // where 1 tức là nó đúng
    if ($keyw != "") {
        $sql .= " and name like '%" . $keyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listkhachhang = pdo_query($sql);
    return  $listkhachhang;
}

function updatetk($id, $user, $email, $pass, $address, $tel)
{
        $sql = "UPDATE `user` SET `user` = '{$user}', `email` = '{$email}', `pass` = '{$pass}', `address` = '{$address}', `tel` = '{$tel}' WHERE `taikhoan`.`id` = '$id' ";
        pdo_execute($sql);
}

function update_mk($pass, $id)
{
        $sql = "UPDATE `user` SET `password` = '{$pass}' WHERE `user`.`user_id` = '$id' ";
        pdo_execute($sql);
}

function dangnhap($email, $password)
{
    $sql = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function quenmk($email, $phone)
{
    $sql = "SELECT * FROM `user` WHERE email='$email' and phone='$phone'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function dangxuat()
{
    if (isset($_SESSION['taikhoan'])) {
        unset($_SESSION['taikhoan']);
        session_destroy();
    }
}

function sendMail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);

        return "gui email thanh cong";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '6bda0a4c1abcfc';                     //SMTP username
        $mail->Password   = '4430da6c8b9967';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'DuAnMau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mau khau cua ban la' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//     function updatesp($id, $iddm, $tensanpham, $price, $mota, $img)
// {
//     // Kiểm tra xem người dùng đã chọn hình ảnh mới hay không
//     if ($_FILES['img']['name'] != "") {
//         // Nếu họ đã chọn hình ảnh mới, thực hiện việc tải lên và cập nhật hình ảnh mới
//         // $new_image = uploadImage(); // Hàm uploadImage() là hàm để tải lên hình ảnh mới
//         // Thực hiện truy vấn SQL để cập nhật thông tin sản phẩm với đường dẫn hình ảnh mới
//         $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}', `img` = '{$img}' WHERE `sanpham`.`id` = '$id' ";
//         pdo_execute($sql);
//     } else {
//         // Nếu họ không chọn hình ảnh mới, sử dụng đường dẫn hình ảnh cũ để cập nhật
//         $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}' WHERE `sanpham`.`id` = '$id' ";
//         pdo_execute($sql);
//     }
// }