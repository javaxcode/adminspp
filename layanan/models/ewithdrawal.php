<?php

require '../../include/fungsi.php';

$idd = $_GET["id"];
$status = $_GET["status"];
$email = $_GET["email"];

$redirect = "../withdrawal";
if ($status == 2) {
    $alert = "withdrawal sukses";
} elseif ($status == 3) {
    $alert = "withdrawal gagal";
}

// date_default_timezone_set('Asia/Jakarta'); 
// $date = new DateTime();
// $tgl = echo $date->format('d-m-Y : H:i');

$wp = query("SELECT * FROM withdrawal WHERE id = $idd")[0];


$id = $wp["id"];




//query edit data
$query = "UPDATE withdrawal 
               SET status = '$status'                
                WHERE id = $id
            ";
mysqli_query($conn, $query);

//cek apakah data berhasil di edit
if (mysqli_affected_rows($conn) > 0) {
    if (mysqli_affected_rows($conn) > 0) {

        /*ambil data dari tabel validasi*/
        $ceka = mysqli_query($conn, "SELECT * FROM validasi WHERE email = '$email'");
        $data = mysqli_fetch_array($ceka);
        $cEmail = $data['email'];
        // $cNama = $data['nama'];
        // $no_akun = $data['no_akun'];
        // $broker = $data['broker'];

        $ceku = mysqli_query($conn, "SELECT * FROM users WHERE email = '$cEmail'");
        $user = mysqli_fetch_array($ceku);
        $cUser = $user['username'];

        $subject = "Withdrawal Notification SPP21";
        $titleMsg = "Withdrawal Notification";
        if ($status == 2) {
            $descriptionMsg = "Hello " . $cUser . "! <br> Your withdrawal has been approved by admin!";
        } else {
            $descriptionMsg = "Hello " . $cUser . "! <br> Your withdrawal has been rejected by admin!";
        }
        $btnMsg = "Back to dashboard";
        // $bccAddress = "support@mamspp21.com";

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

        include '../../mail/mail_confirmpass.php';
        include './m_mail.php';

        if ($mail->Send()) {
            echo "
            <script>
                alert('$alert');
                document.location.href = '$redirect';
            </script>
            ";
        } else {
            echo "Mail Error - >" . $mail->ErrorInfo;
        }
    } else {
        echo "
                <script>
                    alert('$alert');
                    document.location.href = '$redirect';
                </script>
                ";
    }
} else {
    echo "
            <script>
                alert('$alert');
                document.location.href = '$redirect';
            </script>
            ";
}


// //cek apakah data berhasil di edit
// if(  mysqli_affected_rows($conn) > 0 ) {
//     echo "          
//         <script>
//             alert('validasi sukses');

//         </script>
//         ";

// //ambil data dari tabel validasi
// $ceka = mysqli_query($conn,"SELECT * FROM validasi WHERE id = $idd");
// $data = mysqli_fetch_array($ceka);
// $cEmail = $data['email'];
// $cNama = $data['nama'];
// $no_akun = $data['no_akun'];
// $broker = $data['broker'];

// $ceku = mysqli_query($conn,"SELECT * FROM user WHERE email = '".$cEmail."'");
// $user = mysqli_fetch_array($ceku);
// $cUser = $user['username'];

// require '../mail/valid.php';

// require_once('../classes/class.phpmailer.php');


// $to = $cEmail;
// $SubjectMsg = "Validasi Akun Berhasil";
// $bodyMsg = $message;

//     $mail = new PHPMailer; 
//     $mail->IsSMTP();
//     $mail->SMTPSecure = 'tls'; 
//     $mail->Host = "mail.stasiuntrader.org"; //host masing2 provider email
//     //$mail->SMTPDebug = 3;
//     $mail->Port = 587;
//     $mail->SMTPAuth = true;
//     $mail->Username = "cs@stasiuntrader.org"; //user email
//     $mail->Password = "212sablenk212"; //password email 
//     $mail->SetFrom("cs@stasiuntrader.org", "Stasiun Trader"); //set email pengirim
//     $mail->AddAddress($to);  //tujuan email
//     $mail->AddBCC("cs@stasiuntrader.org", "Notif Stasiun Traider");

//     $mail->Subject  =  $SubjectMsg;
//     $mail->IsHTML(true);
//     $mail->Body    = $bodyMsg;

//   if($mail->Send())
//   {
//             echo '
//         <script> alert("validasi sukses"); 
//                 document.location.href = "../validasi-akun";
//         </script>
//         ';


//   }
//   else
//   {
//     echo "Mail Error - >".$mail->ErrorInfo;
//   } 

// } else {
//     echo "
//         <script>
//             alert('validasi gagal');
//             document.location.href = '../validasi-akun';
//         </script>
//         ";
// }