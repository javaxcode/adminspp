<?php

require '../../include/fungsi.php';


if (isset($_POST["affiliasi"])) {
    $id = $_POST["id"];
    $paket = $_POST["paket"];
    // echo "<br>";
    $rank = $_POST["rank"];

    /*query edit data*/
    $query = "UPDATE usersnetwork SET
                paket = '$paket',
                rank = '$rank'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('edit berhasil');
                document.location.href = '../affiliasi';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('edit gagal');
                document.location.href = '../affiliasi';
            </script>
            ";
    }
}
