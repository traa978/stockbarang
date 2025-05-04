<?php

require_once "databaseConnect.php";

$showalert = false;

if (isset($_POST['tambahstockkeluar'])){
    $namabarang = $_POST['databarangkeluar'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $tipe = $_POST['tipe'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $datastock = mysqli_query($db, "SELECT * FROM stock WHERE idbarang='$namabarang'");
    $setdatastock = mysqli_fetch_array($datastock);

    $ambildatastock = $setdatastock['stock'];
    $tambahstockdata = $ambildatastock-$qty;

    $tambahstockkeluar = mysqli_query($db,
    "INSERT INTO barangkeluar
    (idbarang, Kategori, Merek, Tipe, Penerima, qty) 
    VALUES 
    ('$namabarang','$kategori','$merek','$tipe','$penerima','$qty')"
    );

    $updatestockkeluar = mysqli_query($db, "UPDATE stock SET stock='$tambahstockdata' WHERE idbarang='$namabarang'");

    if ($tambahstockkeluar) {
        $showalert = true;
        } else {
        }
}