<?php
session_start();
require "config.php";
$conn = koneksi();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AR Coffee Culture - Tentang</title>
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
          <li class="nav-item"><a href="index.php" class="nav-link">Menu</a></li>
          <li class="nav-item active"><a href="about.php" class="nav-link">Tentang</a></li>
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

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_3.png);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Tentang Kami</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Menu</a></span> <span>Tentang</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(images/dashboard.jpg);"></div>
    <div class="one-half ftco-animate">
      <div class="overlap">
        <div class="heading-section ftco-animate ">
          <span class="subheading">Jelajahi</span>
          <h2 class="mb-4">Cerita Kami</h2>
        </div>
        <div>
          <p>Kafe kami adalah lebih dari sekadar tempat untuk menikmati kopi. Ini adalah tempat di mana setiap biji kopi
            memiliki cerita, dan setiap cangkir menyampaikan rasa dan aroma yang tak terlupakan. Kami percaya bahwa
            setiap kunjungan ke kafe ini adalah bagian dari perjalanan yang lebih besar, penuh dengan kehangatan,
            kenangan, dan cita rasa yang autentik. Mari bergabung dengan kami dalam menjelajahi dunia kopi, di mana
            setiap hari adalah awal dari cerita baru.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.png);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Testimoni</span>
          <h2 class="mb-4">Pelanggan</h2>
          <p>Berikut adalah testimoni dari pelanggan kami.</p>
        </div>
      </div>
    </div>
    <div class="container-wrap">
      <div class="row d-flex no-gutters">
        <div class="col-lg align-self-sm-end">
          <div class="testimony">
            <blockquote>
              <p>&ldquo;Tempat di mana kenikmatan kopi menjadi lebih dari sekadar tradisi, melainkan pengalaman tak
                terlupakan.&rdquo;</p>
            </blockquote>
            <div class="author d-flex mt-4">
              <div class="image mr-3 align-self-center">
                <img src="images/person_1.jpg" alt="">
              </div>
              <div class="name align-self-center">Fachrul Arthal <span class="position">UI/UX Designer</span></div>
            </div>
          </div>
        </div>
        <div class="col-lg align-self-sm-end">
          <div class="testimony overlay">
            <blockquote>
              <p>&ldquo;Kopi yang disajikan di sini sungguh istimewa. Aromanya menggoda dan rasanya tak
                tertandingi.&rdquo;</p>
            </blockquote>
            <div class="author d-flex mt-4">
              <div class="image mr-3 align-self-center">
                <img src="images/person_2.jpg" alt="">
              </div>
              <div class="name align-self-center">Nur Indah Permatasari <span class="position">Staf Bank
                  Sulselbar</span></div>
            </div>
          </div>
        </div>
        <div class="col-lg align-self-sm-end">
          <div class="testimony">
            <blockquote>
              <p>&ldquo;Saya selalu merekomendasikan tempat ini kepada teman-teman. Kualitas kopinya konsisten dan
                selalu memuaskan.&rdquo;</p>
            </blockquote>
            <div class="author d-flex mt-4">
              <div class="image mr-3 align-self-center">
                <img src="images/person_3.jpg" alt="">
              </div>
              <div class="name align-self-center">Richla Rahmatika <span class="position">Data Analyst</span></div>
            </div>
          </div>
        </div>
        <div class="col-lg align-self-sm-end">
          <div class="testimony overlay">
            <blockquote>
              <p>&ldquo;Pelayanan di sini sangat memuaskan. Ditambah dengan rasa kopi yang sempurna, tempat ini menjadi
                favorit saya&rdquo;</p>
            </blockquote>
            <div class="author d-flex mt-4">
              <div class="image mr-3 align-self-center">
                <img src="images/person_4.jpg" alt="">
              </div>
              <div class="name align-self-center">Irnandi <span class="position">Mahasiswa Teknik Informatika</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg align-self-sm-end">
          <div class="testimony">
            <blockquote>
              <p>&ldquo;Setiap kali datang ke sini, saya merasa seperti di rumah sendiri. Kopi yang nikmat dan suasana
                yang hangat.&rdquo;</p>
            </blockquote>
            <div class="author d-flex mt-4">
              <div class="image mr-3 align-self-center">
                <img src="images/person_5.jpg" alt="">
              </div>
              <div class="name align-self-center">Khalil Gibran <span class="position">Machine Learning Engineer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 pr-md-5">
          <div class="heading-section text-md-right ftco-animate">
            <span class="subheading">Temukan</span>
            <h2 class="mb-4">Menu Kami</h2>
            <p class="mb-4">Temukan pilihan menu kami yang beragam, dari kopi yang lembut hingga hidangan yang menggugah
              selera, semuanya disajikan dengan penuh cinta dan kehangatan.</p>
            <p><a href="index.php" class="btn btn-primary btn-outline-primary px-4 py-3">Lihat Menu Lengkap</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <div class="menu-entry">
                <a href="index.php" class="img" style="background-image: url(images/Cappucino.jpg);"></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="menu-entry mt-lg-4">
                <a href="index.php" class="img" style="background-image: url(images/burger.jpg);"></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="menu-entry">
                <a href="index.php" class="img" style="background-image: url(images/IcedSaltedCaramelLatte.jpg);"></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="menu-entry mt-lg-4">
                <a href="index.php" class="img" style="background-image: url(images/nasiGoreng.jpg);"></a>
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
      <div class="row mb-5">
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
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            Copyright &copy;<script data-cfasync="false"
              src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>
              document.write(new Date().getFullYear());
            </script> Semua Hak Dilindungi | Dibuat dengan
            oleh <a href="#" target="_blank">Muhammad Arya Ananda S</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle>
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00">
      </circle>
    </svg></div>
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

  <script async="" src="../../gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
</body>

</html>