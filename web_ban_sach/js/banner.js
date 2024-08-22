// Code sline ảnh tự động Trang chủ
var img = ['/web_ban_sach/img/banner/banner_trangchu/1.jpg', '/web_ban_sach/img/banner/banner_trangchu/2.jpg', '/web_ban_sach/img/banner/banner_trangchu/3.jpg', '/web_ban_sach/img/banner/banner_trangchu/4.jpg', '/web_ban_sach/img/banner/banner_trangchu/5.jpg', '/web_ban_sach/img/banner/banner_trangchu/6.jpg', '/web_ban_sach/img/banner/banner_trangchu/7.jpg'];
var dauTien = 0;
var playInterval;

function nextImg() {
    if (dauTien < img.length - 1) {
        dauTien++;
        document.getElementById('banner_trangchu').src = img[dauTien];
    } else {
        dauTien = 0;
        document.getElementById('banner_trangchu').src = img[dauTien];
    }
}

setInterval(nextImg, 2500);

// =========================================================================

// Code sline ảnh tự động Tin tức
var img = ['/web_ban_sach/img/banner/banner_tintuc/1.jpg', '/web_ban_sach/img/banner/banner_tintuc/2.jpg', '/web_ban_sach/img/banner/banner_tintuc/3.jpg', '/web_ban_sach/img/banner/banner_tintuc/4.jpg'];
var dauTien = 0;
var playInterval;

function nextImg() {
    if (dauTien < img.length - 1) {
        dauTien++;
        document.getElementById('banner_tintuc').src = img[dauTien];
    } else {
        dauTien = 0;
        document.getElementById('banner_tintuc').src = img[dauTien];
    }
}

setInterval(nextImg, 2500);


// // Code sline ảnh ấn nút
// function pauseImg() {
//     if (dauTien > 0) {
//         dauTien--;
//         document.getElementById('anh').src = img[dauTien];
//     } else {
//         dauTien = img.length - 1;
//         document.getElementById('anh').src = img[dauTien];
//     }
// }

// function startImg() {
//     if (dauTien < img.length - 1) {
//         dauTien++;
//         document.getElementById('anh').src = img[dauTien];
//     } else {
//         dauTien = 0;
//         document.getElementById('anh').src = img[dauTien];
//     }
// }
