<?php
require 'include/fungsi.php';
$namatabel = "admin";

$username = "spp21";


$passwordb = "spp215758";
$passwordb2 = "spp215758";

$idadmin = query("SELECT * FROM $namatabel WHERE username = '$username' ")[0];
$id = $idadmin["id"];

//cek username  email sudah ada atau belum
$cekemail = mysqli_query($conn, "SELECT * FROM $namatabel WHERE username = '$username'");
if (mysqli_num_rows($cekemail) === 1) {


    // cek konfirmasi passqord
    if ($passwordb !== $passwordb2) {
        echo "<script>
                    alert('konfirmasi password tidak sesuai');
                    document.location.href = 'index';
                </script>
                ";
        return false;
    }
}



//$error = true;

//enskripsi password
$passwordb = password_hash($passwordb, PASSWORD_DEFAULT);


//query edit data
$query = "UPDATE $namatabel SET
                
                password = '$passwordb'                
                WHERE id = '$id'
            ";
mysqli_query($conn, $query);

//cek apakah data berhasil di edit
if (mysqli_affected_rows($conn) > 0) {
    echo "          
            <script>
                alert('password $username berhasil diperbarui');
                document.location.href = 'index';
            </script>
            ";
} else {
    echo "
            <script>
                alert('ubah password $username gagal');
                document.location.href = 'index';
            </script>
            ";
}