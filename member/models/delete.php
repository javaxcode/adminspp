<?php
require '../../include/fungsi.php';

$id = $_GET["id"];
$tabel = $_GET["tbl"];

if ($tabel == "validasi") {
    $redirect = "../validasi-akun";
} elseif ($tabel == "deposit") {
    $redirect = "../deposit";
} elseif ($tabel == "withdrawal") {
    $redirect = "../withdrawal";
}
mysqli_query($conn, "DELETE FROM $tabel WHERE id = $id");

if (mysqli_affected_rows($conn) > 0) {
    echo "          
            <script>
                
                document.location.href = '$redirect';
            </script>
            ";
} else {
    echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = '$redirect';
            </script>
            ";
}
