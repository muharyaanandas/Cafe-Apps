<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_admin"])) {
  header("location:../login.php");
}

$id_user = $_GET['id'];
$sql_user = sql("SELECT * FROM user WHERE id_user='$id_user'");
$user = $sql_user->fetch_assoc();

if (isset($_POST["submit"])) {
  $nama_user = $_POST["nama_user"];
  $email = $_POST["email"];
  $nomor_hp = $_POST["nomor_hp"];

  $update = sql("UPDATE user SET nama_user='$nama_user', email='$email', nomor_hp='$nomor_hp' WHERE id_user='$id_user'");

  if ($update) {
    echo "
      <script>
      alert('Data pelanggan berhasil diperbarui');
      document.location.href = 'daftar_pelanggan.php';
      </script>
      ";
  } else {
    echo "
      <script>
      alert('Data pelanggan gagal diperbarui');
      document.location.href = 'edit_pelanggan.php?id=$id_user';
      </script>
      ";
  }
}
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
    <title>Admin - Edit Pelanggan</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class="nav-item active">
                <a class="nav-link" href="daftar_pelanggan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelola Pelanggan</span></a>
            </li>

            <!-- Nav Item - Kelola Produk -->
            <li class="nav-item">
                <a class="nav-link" href="daftar_produk.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelola Produk</span></a>
            </li>

            <!-- Nav Item - Kelola Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="daftar_transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelola Transaksi</span></a>
            </li>

            <!-- Nav Item - Kelola Kontak -->
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo Admin</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Pelanggan</h1>
                    </div>

                    <!-- Content Row -->
                    <!-- Form Edit Pelanggan -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user"
                                        value="<?= $user['nama_user']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $user['email']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                                        value="<?= $user['nomor_hp']; ?>" required>
                                </div>
                                <a href="daftar_pelanggan.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Perbarui Data</button>
                            </form>
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
                        <span>Copyright &copy; Semua Hak Dilindungi | Dibuat dengan oleh Muhammad Arya Ananda S</span>
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

</body>

</html>