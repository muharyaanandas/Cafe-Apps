<?php
session_start();
require "config.php";
$conn = koneksi();

$sql_produk = $conn->query("SELECT * FROM produk");
$limit = $sql_produk->fetch_assoc();

if (isset($_POST["submit"])) {
  if ($limit['qty_produk'] < $_POST["qty_cart"]) {
    echo "
        <script>
        alert('Maaf, Pesanan anda melewati jumlah stok kami');
        document.location.href = 'index.php';
        </script>
        ";
  } else {
    $cart = cart();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AR Coffee Culture - Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">AR Coffee<small>Culture</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="#menu" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">Tentang</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Kontak</a></li>
          <?php
          if (!isset($_SESSION['login_pelanggan'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Masuk</a>
          </li>
          <?php } else { ?>
          <?php
            $sql_user = $conn->query("SELECT * FROM user WHERE id_user='$_SESSION[id_pelanggan]'");
            $user = $sql_user->fetch_assoc();
            ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Halo <?= $user['nama_user']; ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="pesanan_saya.php">Pesanan Saya</a>
              <a class="dropdown-item" href="ubah_profil.php">Ubah Profil</a>
              <a class="dropdown-item" href="ubah_password.php">Ubah Password</a>
              <a class="dropdown-item" href="logout.php">Keluar</a>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item cart"><a href="cart.php" class="nav-link"><span
                class="icon icon-shopping_cart"></span><span
                class="bag d-flex justify-content-center align-items-center">
                <?php
                $cart = 0;
                if (isset($_SESSION['login_pelanggan'])) {
                  $result = $conn->query("SELECT * FROM cart WHERE id_user='$_SESSION[id_pelanggan]'");
                  if ($result) {
                    $cart = mysqli_num_rows($result);
                  }
                }
                ?>
                <small><?= $cart; ?></small></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_1.png);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Selamat Datang</span>
            <h1 class="mb-4">Eksplorasi Rasa Kopi yang Luar Biasa</h1>
            <p class="mb-4 mb-md-5">Tempat kami menghadirkan kopi dengan keistimewaan yang tak tertandingi. Nikmati
              setiap tegukan dengan kelezatan sempurna.</p>
            <p>
              <a href="#product" class="btn btn-primary p-3 px-xl-4 py-xl-3">Tunggu apa lagi? Pesan sekarang</a>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(images/bg_2.png);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Selamat Datang</span>
            <h1 class="mb-4">Kopi Terbaik &amp; Suasana yang Menenangkan</h1>
            <p class="mb-4 mb-md-5">Tempat kopi berkualitas tinggi bertemu dengan suasana yang nyaman. Rasakan
              kehangatan di setiap tegukan.</p>
            <p>
              <a href="#product" class="btn btn-primary p-3 px-xl-4 py-xl-3">Tunggu apa lagi? Pesan sekarang</a>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(images/bg_3.png);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Selamat Datang</span>
            <h1 class="mb-4">Kopi Krimi Hangat untuk Momen Terbaik</h1>
            <p class="mb-4 mb-md-5">Kami menghadirkan kopi krimi hangat yang siap menemani momen terbaik Anda. Pesan
              sekarang dan nikmati setiap tegukannya.</p>
            <p>
              <a href="#product" class="btn btn-primary p-3 px-xl-4 py-xl-3">Tunggu apa lagi? Pesan sekarang</a>
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-menu" id="product">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Temukan</span>
          <h2>Produk Kami</h2>
        </div>
      </div>
      <div class="row d-md-flex" id="menu">
        <div class="col-lg-12 ftco-animate p-md-5">
          <div class="row">
            <div class="col-md-12 d-flex align-items-center">

              <div class="tab-content ftco-animate" id="v-pills-tabContent" style="width: 100%;">

                <div class="tab-pane fade show active" id="<?= $cek; ?>" role="tabpanel"
                  aria-labelledby="<?= $cek; ?>-tab">
                  <div class="row">
                    <?php foreach ($sql_produk as $produk) : ?>
                    <div class="col-md-4 text-center">
                      <div class="menu-wrap">
                        <a href="#" class="menu-img img mb-4"
                          style="background-image: url(images/produk/<?= $produk['gambar_produk']; ?>);"></a>
                        <div class="text">
                          <h3>
                            <a href="#"><?= $produk['nama_produk']; ?></a>
                          </h3>
                          <p class="price">
                            <span><?= number_format($produk['harga_produk']); ?></span>
                          </p>
                          <p>Qty Product :</p>
                          <div class="row">
                            <div class="col d-flex justify-content-center">
                              <form action="#" method="post" class="appointment-form">
                                <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                <div class="d-md-flex">
                                  <div class="form-group" style="background-color:#37393b">
                                    <input type="number" min="1" value="1"
                                      onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                      name="qty_cart" class="form-control text-center" style="width: 40px;">
                                  </div>
                                  <div class="form-group ml-md-4">
                                    <?php if ($produk['qty_produk'] == 0) { ?>
                                    <p><i>Stock Habis</i></p>
                                    <?php } else { ?>
                                    <button type="submit" name="submit" class="btn btn-white py-3 px-4">Tambahkan ke
                                      troli</button>
                                    <?php } ?>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Tentang Kami</h2>
            <p>Di kafe kami, setiap cangkir kopi diseduh dengan hati-hati, menciptakan pengalaman kopi yang hangat dan
              istimewa. Kami menyatukan cita rasa kopi terbaik dengan suasana nyaman, menjadikan tempat kami sempurna
              untuk momen berharga Anda.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="https://www.whatsapp.com/"><span class="icon-whatsapp"></span></a></li>
              <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Blog Terbaru</h2>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="https://kopinian.com/jenis-minuman-kopi/">Ini 15 Jenis Minuman Kopi yang
                    Ada di Menu Coffee Shop</a></h3>
                <div class="meta">
                  <div><a href="https://kopinian.com/jenis-minuman-kopi/"><span class="icon-calendar"></span> 6 Februari
                      2024</a></div>
                  <div><a href="https://kopinian.com/author/rhea/"><span class="icon-person"></span> Penulis</a></div>
                  <div><a href="https://kopinian.com/jenis-minuman-kopi/#respond"><span class="icon-chat"></span> 0</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="https://kopinian.com/teknik-manual-brew/">10 Teknik Manual Brew Kopi,
                    Pemula Wajib Tahu!</a></h3>
                <div class="meta">
                  <div><a href="https://kopinian.com/teknik-manual-brew/"><span class="icon-calendar"></span> 4 Januari
                      2024</a></div>
                  <div><a href="https://kopinian.com/author/nadiah/"><span class="icon-person"></span> Penulis</a></div>
                  <div><a href="https://kopinian.com/teknik-manual-brew/#respond"><span class="icon-chat"></span> 0</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Layanan</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Kopi yang Baru Diseduh</a></li>
              <li><a href="#" class="py-2 d-block">Pengiriman Rumah</a></li>
              <li><a href="#" class="py-2 d-block">Makanan Ringan Berkualitas</a></li>
              <li><a href="#" class="py-2 d-block">Katering</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Punya pertanyaan?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Makassar, Sulawesi Selatan,
                    Indonesia</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 089133444322</span></a></li>
                <li><a href="https://mail.google.com/"><span class="icon icon-envelope"></span><span class="text"><span
                        class="__cf_email__"
                        data-cfemail="4d24232b220d3422383f2922202c2423632e2220">&#160;&#160;aryaclouddatabase@gmail.com</span></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Semua Hak Dilindungi | Dibuat dengan
            oleh <a href="#" target="_blank"> Muhammad Arya Ananda S</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>