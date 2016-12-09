<?php
$host = "localhost";
$usr = "root";
$pwd = "root";
$dbname = "php_mysqli";
$koneksi = mysqli_connect($host, $usr, $pwd, $dbname);
if(mysqli_connect_error()){
    echo 'database gagal dikoneksikan!'.mysqli_connect_error();
}
?>

