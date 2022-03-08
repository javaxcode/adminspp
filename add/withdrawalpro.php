<?php 

require '../include/header.php';

$idd = $_GET["id"];

$fw = "Firewoodfx";
$ratefw = query("SELECT * FROM rate WHERE broker = '".$fw."' ")[0];
$rfw = number_format($ratefw["withdrawal"]);

$if = "Insta Forex";
$rateif = query("SELECT * FROM rate WHERE broker = '".$if."' ")[0];
$rif = number_format($rateif["withdrawal"]);

$wp = query("SELECT * FROM withdraw WHERE id = $idd") [0];
$no_akun = $wp["no_akun"];
$broker = $wp["broker"];
$withdrawal = number_format($wp["withdrawal"],2);
$total = number_format($wp["total"]);
$bank = $wp["bank"];
$norek = $wp["norek"];
$namarek = $wp["namarek"];
$email = $wp["email"];
$cEmail = $wp["email"];

$u = query("SELECT * FROM user WHERE email = '".$email."'") [0];
$username = $u["username"];



if($broker == 'firewoodfx'){
      $dollar = $rfw;

    }elseif($broker == 'insta forex'){
          $dollar = $rif;
        
    }else if($broker == 'dompet')   {
        $dollar = "10.000";
    }

    $id = $wp["id"];
    $status = 2 ;

if ($broker != 'dompet') {
    $asaldana = 'Broker';
}else {
    $asaldana = 'Sumber Dana';
}
    

    //query edit data
    $query = "UPDATE withdraw 
               SET status = '$status'                
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if(  mysqli_affected_rows($conn) > 0 ) {
        echo "          
            <script>
                alert('withdrawal sukses');
                
            </script>
            ";
            require '../mail/wds.php';

            require_once('../classes/class.phpmailer.php');

     
            $email = $cEmail;
            $SubjectMsg = "Withdrawal Sukses";
            $bodyMsg = $message;
  
            require '../mail/scriptmailer.php';
             
                $mail->Subject  =  $SubjectMsg;
                $mail->IsHTML(true);
                $mail->Body    = $bodyMsg;
    
              if($mail->Send())
              {
                        echo '
                    <script> 
                            document.location.href = "../withdrawal";
                    </script>
                    ';

                
              }
              else
              {
                echo "Mail Error - >".$mail->ErrorInfo;
              } 


    } else {
        echo "
            <script>
                alert('withdrawal gagal');
                document.location.href = '../withdrawal';
            </script>
            ";
    }
