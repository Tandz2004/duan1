<div class="rowmbheader_admin">
                <h3>WELCOME</h3>
                <p>Chào mừng bạn đến với hệ thống nhà sách StarBook</p>
                <br>
                <?php 
                    if (isset($_SESSION['taikhoan'])) {?>
                        <h5>Developer : <?php echo $_SESSION['taikhoan']['username']; ?></h5>
                        <br>
                    <?php }?>
            </div>
        </header>
        <!-- END HEADER -->