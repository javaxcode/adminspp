<?php

require '../include/header.php';

$idd = $_GET["id"];

$wp = query("SELECT * FROM validasi WHERE id = $idd")[0];

$br = $wp['broker'];
$id = $wp["id"];
$status = 3;



//query edit data
$query = "UPDATE validasi 
               SET status = '$status'                
                WHERE id = $id
            ";
mysqli_query($conn, $query);

//cek apakah data berhasil di edit
if (mysqli_affected_rows($conn) > 0) {
     // echo "          
     //     <script>
     //         alert('validasi sukses');

     //     </script>
     //     ";

     //ambil data dari tabel validasi
     $ceka = mysqli_query($conn, "SELECT * FROM validasi WHERE id = $idd");
     $data = mysqli_fetch_array($ceka);
     $cEmail = $data['email'];
     $cNama = $data['nama'];
     $no_akun = $data['no_akun'];
     $broker = $data['broker'];

     $ceku = mysqli_query($conn, "SELECT * FROM user WHERE email = '" . $cEmail . "'");
     $user = mysqli_fetch_array($ceku);
     $cUser = $user['username'];

     if ($broker === "firewoodfx") {
          $brok = "<a target='_blank' href='https://secure.firewoodfxindo.com/client/register?ib=1680013681' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "insta forex") {
          $brok = "<a target='_blank' href='https://secure.instafxbroker.com/open-account?lang=id&x=BEAGK' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "atirox") {
          $brok = "<a target='_blank' href='https://cabinet.atirox.com/registration?partner_code=7371' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "tickmill") {
          $brok = "<a target='_blank' href='https://secure.tickmill.com/trader/index.php?task=1050&referrer=IB82152378' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "fxtm") {
          $brok = "<a target='_blank' href='http://www.forextime.com/?partner_id=4914057' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "fbs") {
          $brok = "<a target='_blank' href='https://idfbsfx.com/registration/real/?ppu=3180394&lang=id' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "xm") {
          $brok = "<a target='_blank' href='https://clicks.pipaffiliates.com/c?c=256988&l=id&p=1' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "octafx") {
          $brok = "<a target='_blank' href='https://my.octaidn.com/open-account/?refid=938313' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "exness") {
          $brok = "<a target='_blank' href='https://www.exness.eu/a/t716l716' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "forexmart") {
          $brok = "<a target='_blank' href='https://www.forexmart.com/register?id=VYKRT' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "fxpro") {
          $brok = "<a target='_blank' href='https://direct.fxpro-indonesia.com/partner/4125110?lang=id' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "superforex") {
          $brok = "<a target='_blank' href='http://superforex.com/?X=ADGF' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "pepperstone") {
          $brok = "<a target='_blank' href='http://trk.pepperstonepartners.com/aff_c?offer_id=139&aff_id=2648' class='link2'>Buka Akun " . $broker . "</a>";
     } elseif ($broker === "forex4you") {
          $brok = "<a target='_blank' href='http://www.forex4you.com/en/?affid=3grtnf9' class='link2'>Buka Akun " . $broker . "</a>";
     } else {
          $brok = "<a target='_blank' href='http://icmarkets.com/?camp=13749' class='link2'>Buka Akun " . $broker . "</a>";
     }

     require '../mail/vgagal.php';

     require_once('../classes/class.phpmailer.php');


     $email = $cEmail;
     $SubjectMsg = "Validasi Akun Gagal";
     $bodyMsg = $message;

     require '../mail/scriptmailer.php';

     $mail->Subject  =  $SubjectMsg;
     $mail->IsHTML(true);
     $mail->Body    = $bodyMsg;

     if ($mail->Send()) {
          echo '
                    <script> alert("validasi gagal"); 
                            document.location.href = "../validasi-akun";
                    </script>
                    ';
     } else {
          echo "Mail Error - >" . $mail->ErrorInfo;
     }
} else {
     echo "
            <script>
                alert('validasi gagal');
                document.location.href = '../validasi-akun';
            </script>
            ";
}
