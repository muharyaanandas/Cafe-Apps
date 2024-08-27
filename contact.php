<?php
session_start();
require "config.php";
$conn = koneksi();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert the data into the database
    $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
      // Redirect to success page
      header("Location: contact_success.php");
      exit();
    } else {
      echo "<p class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</p>";
    }
  
    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AR Coffee Culture - Kontak</title>
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
          <li class="nav-item"><a href="about.php" class="nav-link">Tentang</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link">Kontak</a></li>
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
            <h1 class="mb-3 mt-5 bread">Kontak Kami</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Menu</a></span> <span>Kontak</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section contact-section">
    <div class="container mt-5">
      <div class="row block-9">
        <div class="col-md-4 contact-info ftco-animate">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Informasi Kontak</h2>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Alamat:</span> Makassar, Sulawesi Selatan, Indonesia</p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Whatsapp:</span> <a href="tel://089133444322">+62 089133444322</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Email:</span> <a href="/cdn-cgi/l/email-protection#acc5c2cac3ecd5c3d9dedfc5d8c982cfc3c1"><span
                    class="__cf_email__"
                    data-cfemail="6900070f062910061c1b1a001d0c470a0604">&#160;aryaclouddatabase@gmail.com</span></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 ftco-animate">
          <form action="" method="POST" class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Pesan"
                required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Kirim Pesan Anda" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Map Section -->
  <div id="map" style="height: 500px; width: 100%;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127164.3983237219!2d119.48828657712504!3d-5.1218336286155095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d96c4671%3A0x3030bfbcaf770b0!2sMakassar%2C%20Kota%20Makassar%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1722617030647!5m2!1sid!2sid"
      width="1512" height="500" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"> -->
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