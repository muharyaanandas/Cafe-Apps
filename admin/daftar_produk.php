<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_admin"])) {
  header("location:../login.php");
}

$sql_produk = sql("SELECT * FROM produk");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="../images/favicon.png" type="">
  <title>Admin - Kelola Produk</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- dataTable URL -->
  <link
    href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css"
    rel="stylesheet" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">AR Coffee <sup>Culture</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Kelola Pelanggan -->
      <li class="nav-item">
        <a class="nav-link" href="daftar_pelanggan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Pelanggan</span></a>
      </li>
      <!-- Nav Item - Kelola Produk -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Produk</span></a>
      </li>
      <!-- Nav Item - Kelola Transaksi -->
      <li class="nav-item">
        <a class="nav-link" href="daftar_transaksi.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Transaksi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_contact.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Kontak</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo Admin</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
            <a href="tambah_produk.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah
              Baru</a>
          </div>

          <!-- Content Row -->
          <!-- Data Table -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width=5%>No</th>
                      <th>Nama Produk</th>
                      <th>Jenis</th>
                      <th>Harga Produk</th>
                      <th>QTY</th>
                      <th width=14% class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sql_produk as $produk) : ?>
                    <tr>
                      <th class="text-center"><?= $no; ?></th>
                      <th><?= $produk['nama_produk']; ?></th>
                      <th><?= $produk['jenis']; ?></th>
                      <th><?= $produk['harga_produk']; ?></th>
                      <th><?= $produk['qty_produk']; ?></th>
                      <td>
                        <a href="lihat_produk.php?id=<?= $produk['id_produk']; ?>" class="btn btn-success btn-sm">
                          <span class="text">Lihat</span>
                        </a>
                        <a href="edit_produk.php?id=<?= $produk['id_produk']; ?>" class="btn btn-info btn-sm">
                          <span class="text">Edit</span>
                        </a>
                        <a href="hapus_produk.php?id=<?= $produk['id_produk']; ?>"
                          onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">
                          </span>
                          <span class="text">Hapus</span>
                        </a>
                      </td>
                    </tr>
                    <?php
                      $no++;
                    endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Semua Hak Dilindungi | Dibuat dengan
              oleh Muhammad Arya Ananda S</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih 'Keluar' jika Anda sudah selesai dan ingin mengakhiri sesi ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="../logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../sbadmin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../sbadmin/js/demo/chart-area-demo.js"></script>
  <script src="../sbadmin/js/demo/chart-pie-demo.js"></script>

  <!-- Datatables -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js">
  </script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'Data Produk',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: 'pdfHtml5',
            title: 'Data Produk',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          }
        ]
      });
    });
  </script>


</body>

</html>
