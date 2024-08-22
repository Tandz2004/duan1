// Lấy tham chiếu đến trường nhập mật khẩu và biểu tượng
var passwordField = document.getElementById("password");
var togglePassword = document.getElementById("togglePassword");

// Sự kiện khi người dùng nhấp vào biểu tượng
togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
});