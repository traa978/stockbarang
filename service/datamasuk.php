<?php

require_once "databaseConnect.php";

$showalert = false;

if (isset($_POST['tambahstock'])){
    $namabarang = $_POST['databarangmasuk'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $tipe = $_POST['tipe'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $datastock = mysqli_query($db, "SELECT * FROM stock WHERE idbarang='$namabarang'");
    $setdatastock = mysqli_fetch_array($datastock);

    $ambildatastock = $setdatastock['stock'];
    $tambahstockdata = $ambildatastock+$qty;

    $tambahstock = mysqli_query($db,
    "INSERT INTO barangmasuk 
    (idbarang, Kategori, Merek, Tipe, Keterangan, qty) 
    VALUES 
    ('$namabarang','$kategori','$merek','$tipe','$keterangan','$qty')"
    );

    $updatestock = mysqli_query($db, "UPDATE stock SET stock='$tambahstockdata' WHERE idbarang='$namabarang'");

    if ($tambahstock) {
        $showalert = true;
        } else {
        }
}