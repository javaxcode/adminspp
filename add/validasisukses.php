
<?php

require '../include/fungsi.php';

$idd = $_GET["id"];

// date_default_timezone_set('Asia/Jakarta'); 
// $date = new DateTime();
// $tgl = echo $date->format('d-m-Y : H:i');

$wp = query("SELECT * FROM validasi WHERE id = $idd")[0];


$id = $wp["id"];
$status = 2;



//query edit data
$query = "UPDATE validasi 
               SET status = '$status'                
                WHERE id = $id
            ";
mysqli_query($conn, $query);

//cek apakah data berhasil di edit
if (mysqli_affected_rows($conn) > 0) {
    echo "          
        <script>
            alert('validasi sukses');
            document.location.href = '../layanan/validasi-akun';
        </script>
        ";

    /*ambil data dari tabel validasi*/
    // $ceka = mysqli_query($conn, "SELECT * FROM validasi WHERE id = $idd");
    // $data = mysqli_fetch_array($ceka);
    // $cEmail = $data['email'];
    // $cNama = $data['nama'];
    // $no_akun = $data['no_akun'];
    // $broker = $data['broker'];

    // $ceku = mysqli_query($conn, "SELECT * FROM user WHERE email = '" . $cEmail . "'");
    // $user = mysqli_fetch_array($ceku);
    // $cUser = $user['username'];


    // require '../mail/valid.php';

    // require_once('../classes/class.phpmailer.php');


    // $email = $cEmail;
    // $SubjectMsg = "Validasi Akun sukses";
    // $bodyMsg = $message;

    // require '../mail/scriptmailer.php';

    // $mail->Subject  =  $SubjectMsg;
    // $mail->IsHTML(true);
    // $mail->Body    = $bodyMsg;

    // if ($mail->Send()) {
    //     echo '
    //                 <script> alert("validasi sukses"); 
    //                         document.location.href = "../validasi-akun";
    //                 </script>
    //                 ';
    // } else {
    //     echo "Mail Error - >" . $mail->ErrorInfo;
    // }

} else {
    echo "
            <script>
                alert('validasi gagal');
                document.location.href = '../layanan/validasi-akun';
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


?>
