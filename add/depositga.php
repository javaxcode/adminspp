<?php 

require '../include/header.php';

$idd = $_GET["id"];

$wp = query("SELECT * FROM deposit WHERE id = $idd") [0];


    $id = $wp["id"];
    $status = 3 ;

    

    //query edit data
    $query = "UPDATE deposit 
               SET status = '$status'                
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if(  mysqli_affected_rows($conn) > 0 ) {
        echo "          
            <script>
                
                document.location.href = '../deposit';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('deposit gagal');
                document.location.href = '../deposit';
            </script>
            ";
    }
  

?>
