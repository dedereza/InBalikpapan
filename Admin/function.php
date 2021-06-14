<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tubes");

function query($query)
{
    // buat con menjadi variabel global
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah

function tambahparawisata($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $rangkuman = htmlspecialchars($data["rangkuman"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    //upload gambar
    $gambar = uploadparawisata();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO parawisata
    VALUES
    ('','$nama', '$alamat', '$rangkuman', '$deskripsi', '$gambar')
    
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahpendidikan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $rangkuman = htmlspecialchars($data["rangkuman"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    //upload gambar
    $gambar = uploadpendidikan();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO pendidikan
    VALUES
    ('','$nama', '$alamat', '$rangkuman', '$deskripsi', '$gambar')
    
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahkesehatan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $rangkuman = htmlspecialchars($data["rangkuman"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    //upload gambar
    $gambar = uploadkesehatan();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO kesehatan
    VALUES
    ('','$nama', '$alamat', '$rangkuman', '$deskripsi', '$gambar')
    
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// fungsi hapus

function hapusparawisata($id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM parawisata WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapuspendidikan($id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM pendidikan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapuskesehatan($id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM kesehatan WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function hapussuaramasyarakat($comment_id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM suaramasyarakat WHERE comment_id = $comment_id");
    return mysqli_affected_rows($conn);
}


function hapuskomentarkesehatan($comment_id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM commentkesehatan WHERE comment_id = $comment_id");
    return mysqli_affected_rows($conn);
}


function hapuskomentarpendidikan($comment_id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM commentpendidikan WHERE comment_id = $comment_id");
    return mysqli_affected_rows($conn);
}


function hapuskomentarparawisata($comment_id)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;
    mysqli_query($conn, "DELETE FROM commentparawisata WHERE comment_id = $comment_id");
    return mysqli_affected_rows($conn);
}



// fungsi ubah


function ubahparawisata($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $id = $data['id'];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $rangkuman = $data["rangkuman"];
    $deskripsi = $data["deskripsi"];
    $gambarLama = $data["gambarLama"];

    //cek apakah user pilih gambar baru atau tidak

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadparawisata();
    }


    // query insert data
    $query = "UPDATE parawisata SET
                    nama = '$nama',
                    alamat = '$alamat',
                    rangkuman = '$rangkuman',
                    deskripsi = '$deskripsi',
                    gambar = '$gambar'
                    WHERE id = $id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}

function ubahpendidikan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $id = $data['id'];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $rangkuman = $data["rangkuman"];
    $deskripsi = $data["deskripsi"];
    $gambarLama = $data["gambarLama"];

    //cek apakah user pilih gambar baru atau tidak

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadpendidikan();
    }


    // query insert data
    $query = "UPDATE pendidikan SET
                    nama = '$nama',
                    alamat = '$alamat',
                    rangkuman = '$rangkuman',
                    deskripsi = '$deskripsi',
                    gambar = '$gambar'
                    WHERE id = $id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}


function ubahkesehatan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $id = $data['id'];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $rangkuman = $data["rangkuman"];
    $deskripsi = $data["deskripsi"];
    $gambarLama = $data["gambarLama"];

    //cek apakah user pilih gambar baru atau tidak

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadkesehatan();
    }


    // query insert data
    $query = "UPDATE kesehatan SET
                    nama = '$nama',
                    alamat = '$alamat',
                    rangkuman = '$rangkuman',
                    deskripsi = '$deskripsi',
                    gambar = '$gambar'
                    WHERE id = $id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}


function ubahsuaramasyarakat($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $comment_id  = $data['comment_id'];
    $comment_sender_name = $data["comment_sender_name"];
    $comment = $data["comment"];

    // query insert data
    $query = "UPDATE suaramasyarakat SET
                    comment_sender_name = '$comment_sender_name',
                    comment = '$comment'
                    WHERE comment_id  = $comment_id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}


function ubahkomentarkesehatan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $comment_id  = $data['comment_id'];
    $comment_sender_name = $data["comment_sender_name"];
    $comment = $data["comment"];

    // query insert data
    $query = "UPDATE commentkesehatan SET
                    comment_sender_name = '$comment_sender_name',
                    comment = '$comment'
                    WHERE comment_id  = $comment_id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}


function ubahkomentarpendidikan($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $comment_id  = $data['comment_id'];
    $comment_sender_name = $data["comment_sender_name"];
    $comment = $data["comment"];

    // query insert data
    $query = "UPDATE commentpendidikan SET
                    comment_sender_name = '$comment_sender_name',
                    comment = '$comment'
                    WHERE comment_id  = $comment_id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}


function ubahkomentarparawisata($data)
{
    setcookie("keyword", "", time() - 3600);
    global $conn;

    $comment_id  = $data['comment_id'];
    $comment_sender_name = $data["comment_sender_name"];
    $comment = $data["comment"];

    // query insert data
    $query = "UPDATE commentparawisata SET
                    comment_sender_name = '$comment_sender_name',
                    comment = '$comment'
                    WHERE comment_id  = $comment_id;
    ";
    mysqli_query($conn, $query);
    // cek apakah berhasil atau tidak
    return mysqli_affected_rows($conn);
}









// fungsi cari

function cariparawisata($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM parawisata
                WHERE
            nama LIKE '%$keyword%' 
    ";
    return query($query);
}

function caripendidikan($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM pendidikan
                WHERE
            nama LIKE '%$keyword%' 
    ";
    return query($query);
}

function carikesehatan($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM kesehatan
                WHERE
            nama LIKE '%$keyword%' 
    ";
    return query($query);
}

function carisuaramasyarakat($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM suaramasyarakat
                WHERE
            comment_sender_name LIKE '%$keyword%' 
    ";
    return query($query);
}


function carikomentarkesehatan($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM commentkesehatan
                WHERE
            comment_sender_name LIKE '%$keyword%' 
    ";
    return query($query);
}


function carikomentarpendidikan($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM commentpendidikan
                WHERE
            comment_sender_name LIKE '%$keyword%' 
    ";
    return query($query);
}


function carikomentarparawisata($keyword)
{
    setcookie("keyword", $_GET["keyword"]);
    $query = "SELECT * FROM commentparawisata
                WHERE
            comment_sender_name LIKE '%$keyword%' 
    ";
    return query($query);
}


// fungsi upload

function uploadparawisata()
{
    setcookie("keyword", "", time() - 3600);

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah gambar sdh di upload
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar !')</script>";
        return false;
    }


    // cek ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>alert('ukuran gambar terlalu besar !')</script>";
        return false;
    }

    // lolos 
    // generate nama baru

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../Utama/img/Parawisata/' . $nameFileBaru);

    return $nameFileBaru;
}


function uploadpendidikan()
{
    setcookie("keyword", "", time() - 3600);

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah gambar sdh di upload
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar !')</script>";
        return false;
    }


    // cek ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>alert('ukuran gambar terlalu besar !')</script>";
        return false;
    }

    // lolos 
    // generate nama baru

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../Utama/img/Pendidikan/' . $nameFileBaru);

    return $nameFileBaru;
}


function uploadkesehatan()
{
    setcookie("keyword", "", time() - 3600);

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah gambar sdh di upload
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar !')</script>";
        return false;
    }


    // cek ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>alert('ukuran gambar terlalu besar !')</script>";
        return false;
    }

    // lolos 
    // generate nama baru

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../Utama/img/Kesehatan/' . $nameFileBaru);

    return $nameFileBaru;
}
