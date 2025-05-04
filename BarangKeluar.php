<?php

require "service/databaseConnect.php";
require "service/AuthenticationCek.php";
require "service/datakeluar.php";

$sql = "SELECT * FROM barangkeluar m, stock s where s.idbarang = m.idbarang";
$result = $db->query($sql);

$i=1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/Alert.css" rel="stylesheet" />
        <title>Data Gudang</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .scroll-text {
                max-width: 400px;
                overflow-x: auto;
                white-space: nowrap;
                display: inline-block;
            }

            .scroll-text::-webkit-scrollbar {
                height: 4px;
            }

            .scroll-text::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 4px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Artt STOCK</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="service/Logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></i></div>
                                Daftar Barang
                            </a>
                            <a class="nav-link" href="BarangMasuk.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></i></div>
                                Stock Masuk
                            </a>
                            <a class="nav-link" href="BarangKeluar.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></i></div>
                                Stock Keluar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo htmlspecialchars($_SESSION['username']) . " - " . htmlspecialchars($_SESSION['role']); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Stock Keluar</h1>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item active">Data Barang</li>
                        </ol>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">
                        Tambah Stock Keluar
                        </button>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Barang
                            </div>
                        <?php if ($showalert): ?>
                            <div class="alert success mt-2">
                                <span class="closebtn">&times;</span>
                                <b>Berhasil</b> <i>Stock berhasil di tambahkan!</i>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Merek</th>
                                                <th>Tipe / Model</th>
                                                <th>Penerima</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($result->num_rows > 0): ?>
                                            <?php while($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['NamaBarang']; ?></td>
                                                    <td><?php echo $row['Kategori']; ?></td>
                                                    <td><?php echo $row['Merek']; ?></td>
                                                    <td>
                                                        <div class="scroll-text" title="<?php echo $row['Tipe']; ?>">
                                                            <?php echo $row['Tipe']; ?>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['Penerima']; ?></td>
                                                    <td><?php echo $row['TanggalKeluar'];?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                                <tr>
                                                    <td colspan="3">Tidak ada data</td>
                                                </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Artt</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/294476f93f.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script>
            $(document).ready(function () {
            $('select[name="databarangkeluar"]').on('change', function () {
            var selected = $(this).find(':selected');

            $('#kategori').val(selected.data('kategori'));
            $('#merek').val(selected.data('merek'));
            $('#tipe').val(selected.data('tipe'));
            $('#lokasi').val(selected.data('lokasi'));
            $('#harga').val(selected.data('harga'));
            $('input[name="idbarang"]').val(selected.val());
            });
        });
        </script>

    </body>
    <!-- The Modal -->
<div class="modal fade mt-5" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Stock Keluar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
    <form method="POST">
        <div class="modal-body">
            <select class="form-control mb-2" name="databarangkeluar" required>
            <option value="" selected disabled>-- Pilih Barang --</option>
            <?php
                $ambildatabarang = mysqli_query($db, "SELECT * FROM stock");
                while ($fetcharray = mysqli_fetch_array($ambildatabarang)) {
                    $idbarang = $fetcharray['idbarang'];
                    $databarang = $fetcharray['NamaBarang'];
            ?>
            <option 
                value="<?= $idbarang; ?>"
                data-kategori="<?= $fetcharray['Kategori']; ?>"
                data-merek="<?= $fetcharray['Merek']; ?>"
                data-tipe="<?= $fetcharray['Tipe']; ?>"
                data-lokasi="<?= $fetcharray['Lokasi']; ?>"
                data-harga="<?= $fetcharray['Harga']; ?>"
                >
                <?=$databarang;?>
            </option>
            <?php
            }
            ?>
            </select>
            <input type="hidden" name="idbarang" value="1">
            <input class="form-control mb-2" type="text" name="kategori" id="kategori" placeholder="Kategori" readonly>
            <input class="form-control mb-2" type="text" name="merek" id="merek" placeholder="Merek" readonly>
            <input class="form-control mb-2" type="text" name="tipe" id="tipe" placeholder="Tipe / Model" readonly>
            <input class="form-control mb-2" type="text" name="lokasi" id="lokasi" placeholder="Lokasi Barang" readonly>
            <input class="form-control mb-2" type="text" name="harga" id="harga" placeholder="Harga" readonly>
            <select class="form-control mb-2" name="penerima" required>
                <option value="" selected disabled>-- Penerima --</option>
                <option value="Custumer">Custumer</option>
                <option value="Diborong">Diborong wak.....</option>
            </select>
            <input class="form-control mb-2" type="number" placeholder="Qty" name="qty" required>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="tambahstockkeluar">Tambah</button>
            </div>
        </div>
    </form>
    </div>
 </div>
</div>

<script>

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function () {
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function () {
      div.style.display = "none";
    }, 600);
  };
}
</script>
</html>
