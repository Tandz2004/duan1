<div class="row2">
    <div class="row2 font_title">
        <h1>BIỂU ĐỒ SỐ LƯỢNG BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <div id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
        </div>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                // Set Data
                // const data = google.visualization.arrayToDataTable([
                //   ['Contry', 'Mhl'],
                //   ['Italy', 54.8],
                //   ['France', 48.6],
                //   ['Spain', 44.4],
                //   ['USA', 23.9],
                //   ['Argentina', 14.5]
                // ]);

                const data = google.visualization.arrayToDataTable([
                    ['NAME', 'SỐ LƯỢNG BÌNH LUẬN'],
                    <?php
                    foreach ($listbinhluan as $thongke) {
                        extract($thongke);
                        // echo "<pre>";
                        // print_r($thongke);
                        // die;
                        echo "['$name', $luotxem],";
                    }
                    ?>
                ]);

                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
                    is3D: true
                };

                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);

            }
        </script>

    </div>
</div>