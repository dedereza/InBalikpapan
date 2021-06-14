<?php

require 'function.php';
$parawisata = query("SELECT * FROM parawisata");

setcookie("keyword", "", time() - 3600);
$keyword = "";


$jumlahDataPerhalaman = 2;
$jumlahData = count(query("SELECT * FROM parawisata")); //8


if (isset($_GET["cari"])) {
    $keyword = $_GET["keyword"];
    $parawisata = cariparawisata($_GET["keyword"]);
    $jumlahData = count($parawisata);
}

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awalData = ($halamanAktif - 1) * $jumlahDataPerhalaman;


if (!isset($_COOKIE["keyword"])) {
    $_COOKIE["keyword"] = $keyword;
}


$query = "SELECT * FROM parawisata
                        WHERE
                            nama LIKE '%$keyword%' OR
                            alamat LIKE '%$keyword%'
                            LIMIT $awalData , $jumlahDataPerhalaman
                        ";
$parawisata = query($query);


// Set batas pagination agar tidak kepanjangan
// Batas awal
$batasPagination = 1;
if ($halamanAktif > $batasPagination) {
    $start_number = $halamanAktif - $batasPagination;
} else {
    $start_number = 1;
}

// Batas akhir
if ($halamanAktif <   ($jumlahHalaman - $batasPagination)) {
    $end_number = $halamanAktif + $batasPagination;
} else {
    $end_number = $jumlahHalaman;
}

?>



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INI Balikpapan</title>
    <link rel="icon" href="img/balikpapan.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- magnific CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/gijgo.min.css">
    <!-- niceselect CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- slick CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="sub_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="sub_menu_right_content">
                            <span>INI Balikpapan</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="sub_menu_social_icon">
                            <a href="https://www.facebook.com/Balikpapanku.Official/"><i class="flaticon-facebook"></i></a>
                            <a href="https://twitter.com/balikpapanku?lang=en"><i class="flaticon-twitter"></i></a>
                            <a href="https://www.instagram.com/balikpapanku/"><i class="flaticon-instagram"></i></a>
                            <span><i class="flaticon-phone-call"></i>+6285391121129</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu_iner">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="index.html"> <img src="img/balikpapan.png" width="50" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="parawisata.php">Parawisata</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pendidikan.php">Pendidikan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="kesehatan.php">Kesehatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="suaramasyarakat.php">Suara Masyarakat</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="../Admin/login.php" class="btn_1 d-none d-lg-block">Admin</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Parawisata</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php $i = 1; ?>
                        <?php foreach ($parawisata as $row) : ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="img/Parawisata/<?= $row["gambar"]; ?>" alt="">
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="detailparawisata.php?id=<?= $row["id"]; ?>">
                                        <h2><?= $row["nama"]; ?></h2>
                                    </a>
                                    <p class="text-justify"><?= $row["rangkuman"]; ?></p>
                                </div>
                            </article>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <?php if ($keyword == "") : ?>

                                    <li class="page-item">
                                        <?php if ($halamanAktif > 1) : ?>
                                            <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        <?php endif; ?>
                                    </li>

                                    <?php for ($i = $start_number; $i <= $end_number; $i++) : ?>
                                        <?php if ($i == $halamanAktif) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <li class="page-item">
                                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                            <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php else : ?>

                                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                        <?php if ($i == $halamanAktif) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="parawisata.php?keyword=<?= $_COOKIE["keyword"]; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="parawisata.php?keyword=<?= $_COOKIE["keyword"]; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="get">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword" placeholder='Search Keyword' autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" name="cari">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1" name="cari" type="submit">Search</button>
                            </form>
                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-footer-widget">
                        <h4>Menu InBalikpapan</h4>
                        <ul>
                            <li><a href="about.php">About Balikpapan</a></li>
                            <li><a href="parawisata.php">Parawisata</a></li>
                            <li><a href="pendidikan.php">Pendidikan</a></li>
                            <li><a href="kesehatan.php">Kesehatan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-footer-widget footer_icon">
                        <h4>Hubungi Kami</h4>
                        <p>Jl Sei Wan Gang Swadaya, Balikpapan Utara, Kalimantan , +6285391121121</p>
                        <span>Inbalikapapan@gmail.com</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/Balikpapanku.Official/"><i class="ti-facebook"></i></a>
                            <a href="https://twitter.com/balikpapanku?lang=en"><i class="ti-twitter-alt"></i></a>
                            <a href="https://www.instagram.com/balikpapanku/"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0">
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> INBalikpapan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->


    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- masonry js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- masonry js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>