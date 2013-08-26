<div id="cek" value="true"></div>
<?php
require('connect.php');

//Mengambil data dari tabel database
$sql = "SELECT * FROM $tbl_name ORDER BY waktu DESC";
$result = mysql_query($sql);
while ($rows = mysql_fetch_array($result)) {
    ?>
    <!--menampilkan data satu per satu-->
    <div style="font-size: small; font-style: normal" id="guest-data">
        <div class="row" name="">
            <div class="col-md-1 col-md-offset-1" >
                <!--menampilkan user icon-->
                <img src="img/user-icon.png" alt="guest" class="img-rounded"  style="float: bottom" width="75" id="guest-logo">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-10"  style="white-space: pre-warp; white-space: -moz-pre-wrap; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word; overflow: hidden;" > <!--style untuk wrapping dan memecah kata panjang-->
                        <!--menampilkan nama dan email-->
                        <?php
                        echo "<strong>" . $rows['nama'] . "</strong>";
                        echo "&nbsp&nbsp";
                        echo "<small>" . $rows['email'] . "</small>"
                        ?>

                    </div>
                </div>
                <div class="row"   style="white-space: pre-warp; white-space: -moz-pre-wrap; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word; overflow: hidden;"> <!--style untuk wrapping dan memecah kata panjang-->
                    <div class="col-md-10">
                        <!--menampilkan pesan dan waktu-->
                        <div>
                            <?php
                            //mengubah karakter enter menjadi <br>
                            $pesanstr = str_replace("\n", "<br>", $rows['pesan']);
                            echo $pesanstr;
                            $waktu = $rows['waktu'];
                            echo "<br>";
                            //menghitung dan menampilkan waktu
                            echo "<small>" . elapsedTime($waktu) . ' lalu' . "</small>";
                            ?>
                            <br><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
mysql_close();

//Fungsi untuk menghitung waktu yang lalu
function elapsedTime($time_string) {
    $date = date('Y-m-d H:i:s');

    $time = strtotime($time_string);
    $nowtime = strtotime($date);
    $newtime = $nowtime - $time;

    $tokens = array(
        31536000 => 'tahun',
        2592000 => 'bulan',
        604800 => 'minggu',
        86400 => 'hari',
        3600 => 'jam',
        60 => 'menit',
        1 => 'detik'
    );

    //Mencari satuan waktu yang sesuai
    foreach ($tokens as $unit => $text) {
        if ($newtime < $unit)
            continue;
        $numberOfUnits = floor($newtime / $unit);
        return $numberOfUnits . ' ' . $text;
    }
    return '0 detik';
}
?>


