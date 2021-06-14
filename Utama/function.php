<?php

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


// Fungsi komen
