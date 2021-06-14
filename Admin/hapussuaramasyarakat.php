<?php

require 'function.php';
$comment_id = $_GET["comment_id"];


if (hapussuaramasyarakat($comment_id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus !');
        document.location.href = 'suaramasyarakat.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus !');
        document.location.href = 'suaramasyarakat.php';
    </script>
    ";
}
