<form class="donhang" action="" method="post">
    <table>
        <tr>
            <th>Ảnh</th>
            <th>Name</th>
            <th>Giá</th>
        </tr>

        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><img src="upload/<?php echo $value['image']?>" alt="" width="70px" height="100px"></td>
                    <td><?php echo $value['name']. " - " . $value['name_tap'] ?></td>
                    <td><?php echo $value['price_tra'] ?>đ</td>
                </tr>
        <?php }?>
    </table>
</form>