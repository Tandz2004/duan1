<form class="tong_tintuc" action="" method="post">
    <div class="banner_tintuc">
            <div class="banner_tintuc_khung">
                <img id="banner_tintuc" src="../web_ban_sach/img/banner/banner_tintuc/1.jpg" alt="" width="100%" height="100%">
            </div>
        <script>
            var img = ['../web_ban_sach/img/banner/banner_tintuc/1.jpg', '../web_ban_sach/img/banner/banner_tintuc/2.jpg', '../web_ban_sach/img/banner/banner_tintuc/3.jpg', '../web_ban_sach/img/banner/banner_tintuc/4.jpg'];
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
        </script>
    </div>
    
    