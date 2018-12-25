<?php
include("koneksi.php");
session_start();
//cek apakah user sudah login
if(empty($_SESSION['nama_lengkap'])){
  header("location: panel/login/login.php");
  $tanggal = date("YmdHis");
  // $_SESSION['nama_lengkap'] = $tanggal;
}
else { $nama_lengkap = $_SESSION['nama_lengkap']; 
}
$id_pembeli = $_SESSION['nama_lengkap'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sahabat Petualang Adventure</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="assets/img/sahabat.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="assets/css/call-to-action.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style type="text/css">
    .pagination a {
      color: black;
      padding: 8px 16px;
      text-decoration: none;
      border: 1px solid #ddd;
    }

    .pagination a.active {
      background-color: #1E90FF;
      color: white;
      border: 1px solid blue;
    }

    .pagination a:hover:not(.active) {background-color: #1E90FF;}

    .pagination a:first-child {
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }

    .pagination a:last-child {
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    .bingkai_toko {
      background-color: #ddc;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25) inset, 0 5px 10px 5px rgba(0, 0, 0, 0.25);
      box-sizing: border-box;
      display: inline-block;
      height: 400px;
      padding: 15px;
      position: relative;
      text-align: center;
    }
  </style>
</head>
<body>

  <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container-fluid">

        <div id="logo" class="pull-left">
          <a href="" class="brand"><h4>Sahabat Petualang Adventure</h4></a>
          <!-- <h1><a href="#intro" class="scrollto">Sahabat Petualang Adventure</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="beranda.php?modul=panel/content&page=home">Home</a></li>
            <li><a href="beranda.php?modul=panel/content&page=cara_beli">Cara Beli</a></li>
            <li class="menu-has-children">
              <a href="" id="menu">Kategori</a>
              <ul id="menu-has-children">
                <?php 
                $query_cat= mysqli_query($terhubung, "SELECT * from tbl_category order by nama_category DESC");
                while($data_cat= mysqli_fetch_array($query_cat)){
                  ?>
                  <li><a id="menu" href="beranda.php?modul=panel/content&page=product&id_category=<?php echo "$data_cat[id_category]"; ?>"><?php echo "$data_cat[nama_category]"; ?></a></li>
                  <?php      
                }
                ?>
              </ul>
            </li>
            <li><a href="beranda.php?modul=panel/content&page=store_profil">Toko</a></li>
            <li class="menu-has-children"><a href=""><?php echo $_SESSION['nama_lengkap']; ?></a>
              <ul>
                <li><a href="beranda.php?modul=panel/content&page=accountmyprofile_view_and_edit">My Profile</a></li>
                <li><a href="beranda.php?modul=panel/content&page=riwayat_transaksi">Riwayat Pembelian</a></li>
                <li><a href="panel/content/logout.php" onclick="return confirm('Yakin Ingin Keluar?')">Logout</a></li>
              </ul>
            </li>
            <?php 
            $query_keranjang=mysqli_query($terhubung, "SELECT * FROM tbl_keranjang where id_pembeli='$id_pembeli'");
            $cek_keranjang=mysqli_num_rows($query_keranjang);
            $data_keranjang=mysqli_fetch_array($query_keranjang);
            ?>
            <li><a href="beranda.php?modul=panel/content&page=keranjang&id_pembeli=<?php echo "$data_keranjang[id_pembeli]"; ?>"><?php echo $cek_keranjang; ?><img src="admin/img/icon/keranjang.png" width="30"></a></li>;
          </ul>
        </nav>
      </div>
    </header>

    <div class="intro-container">   
     <!-- Modal -->
     <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
          <!-- heading modal -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>About Us</center></h4>
          </div>
          <!-- body modal -->
          <div class="modal-body">
            <p>Kami dengan senang hati menyewakan berbagai macam peralatan outdoor, yang siap untuk memenuhi kebutuhan Petualangan anda.</p>
          </div>
          <!-- footer modal -->
          <div class="modal-footer">
            <button type="button" class="edit-record btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--==========================
    Intro Section
    ============================-->
    <section id="intro">
      <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

          <ol class="carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
              <div class="carousel-background"><img src="assets/img/slide/1.jpg" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2>Alat yang kamu butuhkan ada disini</h2>
                  <p>Dengan rasa bangga kami menghadirkan alat-alat yang membantu kebutuhan petualangan anda, segera sewa sekarang dan utamakan manajemen yang baik.</p>
                  <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">View More</a>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-background"><img src="assets/img/slide/2.jpg" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2>Alat yang kamu butuhkan ada disini</h2>
                  <p>Dengan rasa bangga kami menghadirkan alat-alat yang membantu kebutuhan petualangan anda, segera sewa sekarang dan utamakan manajemen yang baik.</p>
                  <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">View More</a>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-background"><img src="assets/img/slide/3.jpg" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2>Alat yang kamu butuhkan ada disini</h2>
                  <p>Dengan rasa bangga kami menghadirkan alat-alat yang membantu kebutuhan petualangan anda, segera sewa sekarang dan utamakan manajemen yang baik.</p>
                  <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">View More</a>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-background"><img src="assets/img/slide/4.jpg" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2>Alat yang kamu butuhkan ada disini</h2>
                  <p>Dengan rasa bangga kami menghadirkan alat-alat yang membantu kebutuhan petualangan anda, segera sewa sekarang dan utamakan manajemen yang baik.</p>
                  <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">View More</a>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="carousel-background"><img src="assets/img/slide/5.jpg" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2>Alat yang kamu butuhkan ada disini</h2>
                  <p>Dengan rasa bangga kami menghadirkan alat-alat yang membantu kebutuhan petualangan anda, segera sewa sekarang dan utamakan manajemen yang baik.</p>
                  <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">View More</a>
                </div>
              </div>
            </div>

          </div>

          <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
      </div>
    </section><!-- #intro -->

    <main id="main">

     <div class="content">
      <?php
      if (!isset($_GET['page'])) {
        include ('panel/content/home.php');
      } else {
        $page = $_GET['page'];
        $modul = $_GET['modul'];
        include $modul . '/' . $page . ".php";
      }
      ?>
    </div>

    <div style="background-color: yellow; opacity: 0.5; background-image: url(assets/img/pendaki.png); height: 200px;">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-16 text-center text-lg-center">
            <h1 class="cta-title"><font color="black"><b>Sahabat Petualang Adventure</b></font></h1>
            <p class="cta-text"><font size="4" color="black">"Bagi kamu yang mau liburan mari merapat karena sahabat petualang menyewakan berbagai macam peralatan Gunung."</font></p>
          </div>
        </div>
      </div>
    </div>

    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <center><h3>Kontak Kami</h3></center>
        <center><p>Jangan ragu untuk bertanya apakah Anda memiliki pertanyaan tentang layanan kami atau Anda ingin meminjam Peralatan yang dibutuhkan, kami akan senang mendengar dari Anda.</p></center>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <p>
                1. SPA. Lelea : Blok. 1 Rt/Rw 001/001 Desa Tunggul Payung Kec. Lelea Kab. Indramayu <br /><br />
                2. SPA. Pasekan : Jl. Brawijaya Blok. III Rt/Rw 20/08 No.38 Desa Pasekan Indramayu <br /><br />
                3. SPA. Jl. Lohbener Lama no. 08 Desa Lohbener Kec. Lohbener Indramayu
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>No. HP / WhatsApp</h3>
              <p><a href="tel:+155895548855">085323446611 atau 082243746160</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>
        </div>

        <b>Temukan kami di Google Maps</b>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8919980531923!2d108.28033721431196!3d-6.407911964452043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb87d1fcaf97d%3A0x4fc15b3c8407ada4!2sPoliteknik+Negeri+Indramayu!5e0!3m2!1sid!2sid!4v1542209156420" width="1110" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><br /><br />

        <b>Hubungi Kami,</b>
        <br />Anda Dapat Menghubungi Kami kapanpun, silahkan tinggalkan Pesan dibawah ini.
        <div class="form">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nama_pengirim" class="form-control" id="name" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="emailnya" id="email" placeholder="Email@domain.com" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nopenya" id="subject" placeholder="No . HP / WhatsApp" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea id="mytextarea" class="form-control" name="mess_nya" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Masukkan Pesan"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><input class="edit-record btn btn-primary" type="submit" value="Kirim Pesan" name="pesanku" onclick="return confirm('Yakin Kirim Pesan?')"></div>
            <?php
            include ("koneksi.php");
            if (isset($_POST['pesanku'])) {
              $nama = $_POST['nama_pengirim'];
              $email = $_POST['emailnya'];
              $wa = $_POST['nopenya'];
              $isi = $_POST['mess_nya'];
              $kirimkan_pesan = mysqli_query ($terhubung, "INSERT INTO pesan (nama_lengkap, email, telp, isi_pesan) VALUES ('$nama', '$email', '$wa', '$isi')");
              if ($kirimkan_pesan) {
                ?>
                <script type="text/javascript">
                 alert('Pesan Berhasil Terkirim');
               </script>
               <?php
             } else {
              ?>
              <script type="text/javascript">
               alert('Pesan Gagal Terkirim');
             </script>
             <?php
           }
         }
         ?>
       </form>
     </div>

   </div>
 </section><!-- #contact -->

</main>

  <!--==========================
    Footer
    ============================-->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer-contact">
              <h4>About Us</h4>
              <p>Kami dengan senang hati menyewakan berbagai macam peralatan gunung, yang siap untuk memenuhi kebutuhan Petualangan anda.</p>
            </div>

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Sosial Media</h4>
            <p>
              Temukan kami di Sosial Media, kami dengan senang hati melayani anda
            </p>

            <div class="social-links">
              <a target="_blank" href="https://api.whatsapp.com/send?phone=6282243746160" class="twitter"><i class="fa fa-whatsapp"></i></a>
              <a target="_blank" href="https://www.facebook.com/ibliskh" class="facebook"><i class="fa fa-facebook"></i></a>
              <a target="_blank" href="https://www.youtube.com/?hl=id&gl=ID" class="youtube"><i class="fa fa-youtube"></i></a>
              <a target="_blank" href="https://www.instagram.com/sahabatpetualang_adventure/?hl=id" class="instagram"><i class="fa fa-instagram"></i></a>
              <!-- 
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Subscribe</h4>
            <p>Manfaatkan Email anda sebaik mungkin untuk mendapatkan informasi terbaru dan promo Rental alat dari kami!</p>
            <form action="" method="post">
              <input type="email" name="email_here" placeholder="Email"><input type="submit" name="entry" value="Subscribe">
              <?php 
              if (isset($_POST['entry'])) {
                $email_enter = $_POST['email_here'];
                $sql = mysqli_query($terhubung, "INSERT INTO tbl_subscribe (email) VALUES ('$email_enter')");
                if ($sql) {
                  ?>
                  <script type="text/javascript">
                    alert('Email Terkirim');
                  </script>
                  <?php
                } else {
                  ?>
                  <script type="text/javascript">
                    alert('Email Gagal Terkirim');
                  </script>
                  <?php
                }  
              }
              ?>
            </form>
          </div>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Bank</h4>
            <img src="assets/img/bank.png" width="110%" height="40%">
            <p><br />No. Rek. Admin : 038209382937283782729</p>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      &copy; Copyright <strong>Adventure</strong>
      <?php
      $tgl=date('Y');
      echo $tgl;
      ?> - All Rights Reserved <br />
      Designed by | <a href="index.php" style="text-decoration: none;">Sahabat Petualang Adventure - Indramayu</a>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="assets/lib/jquery/jquery.min.js"></script>
  <script src="assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/lib/easing/easing.min.js"></script>
  <script src="assets/lib/superfish/hoverIntent.js"></script>
  <script src="assets/lib/superfish/superfish.min.js"></script>
  <script src="assets/lib/wow/wow.min.js"></script>
  <script src="assets/lib/waypoints/waypoints.min.js"></script>
  <script src="assets/lib/counterup/counterup.min.js"></script>
  <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/lib/lightbox/js/lightbox.min.js"></script>
  <script src="assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/js/main.js"></script>

  <!-- DataTables -->
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>

</body>
<!-- page script -->
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
  $(document).ready(function(){$("#dataTable").DataTable()});
</script>

<script type="text/javascript" src="tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>

</body>
</html>
