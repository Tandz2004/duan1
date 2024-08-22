<?php
// Validate Name
function validateName($username){
    //Hàm nhận 1 giá trị: là password người dùng nhập vào 
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra
    // Không được bỏ trống
    if (empty($username)) {
        $error['username'] = "*Vui lòng không để trống UserName!";
    } 
    // Ktra tên có ký tự đặc biệt hoặc số hay không
    else if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        // preg_match: ktra và lấy thông tin từ chuỗi dữ liệu
        // =>>> để so sánh với dữ liệu nhập vào
        // =>>> trả về true khi 2 dữ liệu khớp nhau, ngược lại là false
        $error['username'] = "Tên chỉ được là chữ cái và khoảng trắng!";
        // "/.../": biểu thị bắt đầu và kết thúc BT chính quy
        // "^": đại diện cho vị trí bắt đầu
        // "[a-zA-Z ]":đại diện cho tất cả các ký tự
        // "*": đại diện cho việc ký tự đó có thể xuất hiện bao nhiêu lần
        // "$": đại diện cho vị trí kết thúc
        }
    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validateEmail($email, $list_user_email) { 
    //Hàm nhận 2 giá trị: 1 là Email người dùng nhập vào , 2 là Mảng lấy từ trên database về
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra

    //Ktra xem có trống không
    if (empty($email)) {
        $error['email'] = "*Vui lòng không để trống Email";
    } 
    //Ktra xem có tồn tại trong hệ thống không dùng mảng lấy từ database
    else if (is_array($list_user_email) && $email == $list_user_email['email']) {
        $error['email'] = "*Email đã tồn tại trong hệ thống";
    } 
    //Ktra xem có đúng định dạng không
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "*Email không đúng định dạng";
    }
    
    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validatePhone($phone, $list_user_phone){   
    //Hàm nhận 2 giá trị: 1 là Phone người dùng nhập vào , 2 là Mảng lấy từ trên database về
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra

    //Ktra xem có trống không
    if (empty($phone)) {
        $error['phone'] = "*Vui lòng không để trống SĐT!";
    }
    //Ktra xem có tồn tại trong hệ thống không dùng mảng lấy từ database
    else if(is_array($list_user_phone) && $phone == $list_user_phone['phone']){
        $error['phone'] = "*SĐT đã tồn tại trong hệ thống";
    }
    //Đủ 10 số
    else if (strlen($phone) != 10) {
        $error['phone'] = "SĐT phải là 10 số!";
    }
    //Chỉ cho điền số
    else if (!preg_match("/^[0-9]*$/", $phone)) {
        $error['phone'] = "SĐT chỉ được điền số!";
    }

    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validatePass($password){
    //Hàm nhận 1 giá trị: là password người dùng nhập vào 
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra
    //Ktra xem có trống không
    if (empty($password)) {
        $error['password'] = "*Vui lòng không để trống PassWord!";
    }
    //Ktra xem có nhiều hơn 8 ký tự
    else if(strlen($password) < 8) {
        $error['password'] = "*MK phải có nhiều hơn 8 ký tự!";
    }
    else if(!preg_match("/^[A-Z]/", $password)){
        $error['password'] = "*MK phải viết hoa chữ cái đầu";
    }

    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validateRepass($password_again){
    //Hàm nhận 1 giá trị: là password người dùng nhập vào 
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra
    //Ktra xem có trống không
    if (empty($password_again)) {
        $error['password_again'] = "*Vui lòng không để trống!";
    }

    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validate_pass_trung($password, $password_again){
    //Hàm nhận 1 giá trị: là password người dùng nhập vào 
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra
    //Ktra xem có trống không
    if ($password != $password_again) {
        $error['password_trung'] = "*Các mật khẩu đã nhập không khớp. Hãy thử lại.";
    }
    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}

function validateAddress($adress){
    //Hàm nhận 1 giá trị: là password người dùng nhập vào 
    $error = array(); // Khởi tạo mảng lỗi trước khi kiểm tra
    if (empty($adress)) {
        $error['adress'] = "*Vui lòng không để trống Nơi ở!";
    }
    
    //Trả về giá trị
    return $error; // Trả về mảng lỗi sau khi kiểm tra
}
?>