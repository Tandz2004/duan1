// JavaScript
var tangButtons = document.querySelectorAll(".tang-button");
var giamButtons = document.querySelectorAll(".giam-button");
var giohangslInputs = document.querySelectorAll(".giohangsl");
var tinh_tienInputs = document.querySelectorAll(".tinh_tien");
var giaInputs = document.querySelectorAll(".gia");
var tongGia = document.querySelector(".tong-gia input").value;

// Khởi tạo biến tổng giá trị
var tongGiaTri = 0;

// Lặp qua từng hàng trong giỏ hàng
for (var i = 0; i < tangButtons.length; i++) {
    tangButtons[i].addEventListener("click", function() {
        var index = Array.from(tangButtons).indexOf(this);
        var sl = parseFloat(giohangslInputs[index].value);
        var gia_ca = parseFloat(giaInputs[index].innerHTML);

        sl++;
        giohangslInputs[index].value = sl;

        var tien_daylen = gia_ca * sl;
        tinh_tienInputs[index].value = tien_daylen.toFixed(3);

        // Cập nhật tổng giá trị
        tongGiaTri = tinhTongGiaTri();
        updateTongGiaTri(tongGiaTri);
    });

    giamButtons[i].addEventListener("click", function() {
        var index = Array.from(giamButtons).indexOf(this);
        var sl = parseFloat(giohangslInputs[index].value);
        var gia_ca = parseFloat(giaInputs[index].innerHTML);

        if (sl > 1) {
            sl--;
            giohangslInputs[index].value = sl;

            var tien_daylen = gia_ca * sl;
            tinh_tienInputs[index].value = tien_daylen.toFixed(3);

            // Cập nhật tổng giá trị
            tongGiaTri = tinhTongGiaTri();
            updateTongGiaTri(tongGiaTri);
        }
    });
}

// Tính tổng giá trị
function tinhTongGiaTri() {
    var total = 0;
    for (var i = 0; i < tinh_tienInputs.length; i++) {
        total += parseFloat(tinh_tienInputs[i].value);
    }
    return total;
}

// Ban đầu, tính tổng giá trị và hiển thị nó
var tongGiaTriBanDau = tinhTongGiaTri();
updateTongGiaTri(tongGiaTriBanDau);

// Cập nhật tổng giá trị
function updateTongGiaTri(total) {
    // Gán giá trị cho thẻ input có class là 'tonggia'
    var tongGiaInput = document.querySelector(".tonggia");
    if (tongGiaInput) {
        // Sử dụng toLocaleString để định dạng số tiền
        tongGiaInput.value = total.toLocaleString(undefined, { minimumFractionDigits: 3 }) + " đ";
    }
}
