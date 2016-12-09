<!DOCTYPE html>
<?php
include './DBConnection.php';
function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
    
    $host = "localhost";
    $usr = "root";
    $pwd = "root";
    $dbname = "php_mysqli";
    $koneksi = mysqli_connect($host, $usr, $pwd, $dbname);
    if(mysqli_connect_error()){
        echo 'database gagal dikoneksikan!'.mysqli_connect_error();
    }
    
    //proses auto number
    
    $auto = mysqli_query($koneksi, "select $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
    $jumlah_record = mysqli_num_rows($auto);
    if($jumlah_record == 0)
    $nomor = 1;
    
    else{
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan)))+1;
    }
    if($lebar>0)
        $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
    else
        $angka=$awalan.$nomor;
    return $angka;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Membuat Form</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="page-header">
                    <h2>Form Input Dengan AutoNumber</h2>
                </div>
                <form action="Index.php" method="post">
                    <div class="form-group">
                        <label>kd_barang :</label>
                        <input type="text" class="form-control" name="txtKode" value="<?= autonumber("barang", "kd_barang", "4", "KB/") ?>">
                    </div>
                    <div class="form-group">
                        <label>nama :</label>
                        <input type="text" class="form-control" name="txtNama">
                    </div>
                    <div class="form-group">
                        <label>jumlah :</label>
                        <input type="text" class="form-control" name="txtJumlah">
                    </div>
                    <div class="form-group">
                        <label>harga : </label>
                        <input type="text" class="form-control" name="txtHarga">
                    </div>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['simpan'])){
            include './DBConnection.php';
            $kode = $_POST['txtKode'];
            $nama = $_POST['txtNama'];
            $jumlah = $_POST['txtJumlah'];
            $harga = $_POST['txtHarga'];
            
            $query_insert = "INSERT INTO barang (kd_barang, nama, jumlah, harga) values ('$kode', '$nama', '$jumlah', '$harga')";
            $insert = mysqli_query($koneksi, $query_insert) or die(mysqli_error());
            
            if($insert){
                echo '<script>alert("data berhasil di input ke database!");</script>';
                echo '<script>window.location.href=window.location.href();</script>';
            }else{
                echo '<script>alert("data gagal di input ke database !");</script>';
                echo '<script>window.location.href=window.location.href();</script>';
            }
        }
        ?>
    </body>
</html>
