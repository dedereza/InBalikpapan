<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


setcookie("keyword", "", time() - 3600);
$keyword = "";

//panggil file lain

require 'function.php';


//pagination

//aturan pagination



$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM commentpendidikan")); //8


if (isset($_GET["cari"])) {
    $keyword = $_GET["keyword"];
    $komentarpendidikan = carikomentarpendidikan($_GET["keyword"]);
    $jumlahData = count($komentarpendidikan);
}

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awalData = ($halamanAktif - 1) * $jumlahDataPerhalaman;


if (!isset($_COOKIE["keyword"])) {
    $_COOKIE["keyword"] = $keyword;
}


$query = "SELECT * FROM commentpendidikan
                        WHERE
                            comment_sender_name LIKE '%$keyword%' 
                            LIMIT $awalData , $jumlahDataPerhalaman
                        ";
$komentarpendidikan = query($query);


// Set batas pagination agar tidak kepanjangan
// Batas awal
$batasPagination = 3;
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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>InI Balikpapan</title>
    <link rel="icon" href="../Utama/img/balikpapan.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="komentarpendidikan.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INI Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="Parawisata.php">
                    <i class="fas fa-umbrella-beach"></i>
                    <span>Parawisata</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="Pendidikan.php">
                    <i class="fas fa-school"></i>
                    <span>Pendidikan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="Kesehatan.php">
                    <i class="fas fa-book-medical"></i>
                    <span>Kesehatan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-comments"></i>
                    <span>Komentar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Komentar</h6>
                        <a class="collapse-item" href="suaramasyarakat.php">Suara Masyarakat</a>
                        <a class="collapse-item" href="komentarparawisata.php">Komentar Parawisata</a>
                        <a class="collapse-item" href="komentarpendidikan.php">Komentar Pendidikan</a>
                        <a class="collapse-item" href="komentarkesehatan.php">Komentar Kesehatan</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="keyword" autocomplete="off" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="cari">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">INI Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <a class="dropdown-item" href="../Utama/about.php">
                                    <i class="fas fa-home mr-2 text-gray-400"></i>
                                    <!-- <i class="fas fa-cogs fa-sm fa-fw  "></i> -->
                                    Home
                                </a>


                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Komentar Pendidikan</h1>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama </th>
                                            <th>Komentar</th>
                                            <th>Tanggal dan waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 + $awalData; ?>
                                        <?php foreach ($komentarpendidikan as $row) : ?>
                                            <tr>
                                                <th><?= $i; ?></th>
                                                <th><?= $row["comment_sender_name"]; ?></th>
                                                <th><?= substr_replace($row["comment"], "...", 50); ?></th>
                                                <th><?= $row["date"]; ?></th>
                                                <th>
                                                    <a class="badge badge-primary" href="updatekomentarpendidikan.php?comment_id=<?= $row["comment_id"]; ?>">Ubah</a>
                                                    <a class="badge badge-danger" href="hapuskomentarpendidikan.php?comment_id=<?= $row["comment_id"]; ?>">Hapus</a>
                                                </th>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
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
                                    <a class="page-link" href="komentarpendidikan.php?keyword=<?= $_COOKIE["keyword"]; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php else : ?>
                                <li class="page-item">
                                    <a class="page-link" href="komentarpendidikan.php?keyword=<?= $_COOKIE["keyword"]; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endif; ?>
                </ul>
            </nav>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright INI Balikpapan Website 2021</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>


</body>

</html>