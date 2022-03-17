<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');
$tang = $date->format('Y-m-d');
$jam = $date->format('H:i:s');

if (isset($_POST["inputakun"])) {

    $email = $_POST["email"];
    $aff = $_POST["aff"];
    $noakun = $_POST["noakun"];
    $passwordinvestor = $_POST["passwordinvestor"];
    $server = $_POST["server"];
    $created_at = $tgl;
    $updated_at = $tgl;
    $status = 2;

    /*query insert data*/
    $query = "INSERT INTO validasi 
                VALUES 
                ('','$tang','$jam','$email','$passwordinvestor','$server','$noakun','$aff','$status')
            ";
    $masuk_data = mysqli_query($conn, $query);

    $datadeposit = query("SELECT * FROM deposit WHERE email='$email' AND no_akun='First deposit'")[0];
    $iddeposit = $datadeposit["id"];
    //query edit data
    $query = "UPDATE deposit 
            SET status = '$status'                
            WHERE id = $iddeposit
            ";
    mysqli_query($conn, $query);


    //cek apakah data berhasil di input
    if (mysqli_affected_rows($conn) > 0) {
        $subject = "New Account Notification SPP21";
        $titleMsg = "New Account SPP21";
        $descriptionMsg = "Hello " . $email . "! <br> New Account have been made : <b> " . $noakun . " </b> <br> Password Investor : <b> " . $passwordinvestor . " </b> <br> Server : <b> " . $server . " </b>";
        $btnMsg = "Login";
        $bccAddress = "support@mamspp21.com";

        $mailer = query("SELECT * FROM mailer WHERE 1")[0];

        $mailhost1 = $mailer['mailhost1'];
        $username1 = $mailer['username1'];
        $password1 = $mailer['password1'];
        $setfrom1 = $mailer['setfrom1'];

        if ($_SERVER['HTTP_HOST'] != "localhost") {
            $linkhref = "https://mamspp21.com/dashboard/index";
        } else {
            $linkhref = "localhost/newmamps/dashboard/index";
        }

        include '../../email/mail_confirmpass.php';
        include '../../email/m_mail.php';
        if ($mail->send()) {
            echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../deposit';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('input gagal');
                document.location.href = '../deposit';
            </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../deposit';
            </script>
            ";
    }
}