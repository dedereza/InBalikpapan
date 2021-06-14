<?php

require 'function.php';
$id = $_GET["id"];


if (hapusparawisata($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus !');
        document.location.href = 'parawisata.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus !');
        document.location.href = 'parawisata.php';
    </script>
    ";
}
