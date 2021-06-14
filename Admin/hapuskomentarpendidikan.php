<?php

require 'function.php';
$comment_id = $_GET["comment_id"];


if (hapuskomentarpendidikan($comment_id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus !');
        document.location.href = 'komentarpendidikan.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus !');
        document.location.href = 'komentarpendidikan.php';
    </script>
    ";
}
