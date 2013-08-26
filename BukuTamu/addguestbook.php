<?php

require('connect.php');

//Membersihkan masukan dari karakter-karakter yang tidak diinginkan
$nama = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$pesan = filter_var($_POST["pesan"], FILTER_SANITIZE_STRING);

//set format waktu
$waktu = date('Y-m-d H:i:s');
//Memasukkan data ke dalam tabel pada database
$sql = "INSERT INTO $tbl_name(nama, email, pesan, waktu)VALUES('$nama', '$email', '$pesan', '$waktu')";
$result = mysql_query($sql);

mysql_close();
?>
