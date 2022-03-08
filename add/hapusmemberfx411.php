<?php
require '../include/fungsi_fx411.php';



if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $hapus_data = mysqli_query($conn_fx411, "DELETE FROM member WHERE id = $id");
    if ($hapus_data) {
        echo "          
            <script>
                
                document.location.href = '../member-fx411';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = '../member-fx411';
            </script>
            ";
    }
}
