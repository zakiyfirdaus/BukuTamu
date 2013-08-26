<?php
//konfigurasi koneksi database
$host = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name = "guestbook"; // Database name 
$tbl_name = "guest_data"; // Table name 
//Melakukan koneksi ke server dan pemilihan database
mysql_connect("$host", "$username", "$password") or die("cannot connect server ");
mysql_select_db("$db_name") or die("cannot select DB");
?>
