<?php

require "databaseConnect.php";

$showalert = false;

if (isset($_POST['tambah']))
{
    $namabarang = $_POST['namabarang'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $tipe = $_POST['tipe'];
    $lokasi = $_POST['lokasi'];
    $harga = (int)$_POST['harga'];
    $stock = (int)$_POST['stock'];

    $adddatastock = mysqli_query(
        $db,
        "INSERT INTO stock 
        (NamaBarang, Kategori, Merek, Tipe, Lokasi, Harga, stock) 
        VALUES 
        ('$namabarang','$kategori','$merek','$tipe','$lokasi','$harga','$stock')"
        );

    if ($adddatastock) {
    $showalert = true;
    } else {
    }
}
