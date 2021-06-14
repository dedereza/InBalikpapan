<?php
require 'function.php';

// 
$id = $_GET["id"];

// query data mahasiswa berdasarkan id

$pwa = query("SELECT * FROM parawisata WHERE id = $id")[0];

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tubes");


?>
<!doctype html>
<html lang="en">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
                            <p><a href="parawisata.php">Parawisata</a> . Detail Parawisata</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/Parawisata/<?= $pwa["gambar"]; ?>" alt="">
                        </div>
                        <div class="blog_details">
                            <h2><?= $pwa['nama']; ?></h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                            </ul>
                            <p class="text-justify">Lokasi : <?= nl2br($pwa['alamat']); ?></p>

                            <p class="text-justify"><?= nl2br($pwa['deskripsi']); ?></p>

                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" method="post" id="comment_form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="comment_name" id="comment_name" type="text" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment_content" id="comment_content" cols="30" rows="9" placeholder="Tulis komentar"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                <input type="submit" name="send" id="send" class="button button-contactForm btn_1" value="Send Message" />
                                <!-- <button type="submit" class="button button-contactForm btn_1">Send Message</button> -->
                            </div>
                        </form>
                        <span id="comment_message"></span>
                        <br />
                        <div id="display_comment"></div>
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                            </form>
                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->

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
    <script>
        $(document).ready(function() {

            $('#comment_form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "addKomenParawisata.php",
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_comment();
                        }
                    }
                })
            });

            load_comment();

            function load_comment() {
                $.ajax({
                    url: "fetchKomenParawisata.php",
                    method: "POST",
                    success: function(data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
            });

        });
    </script>

</body>

</html>