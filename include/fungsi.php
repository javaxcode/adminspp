<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

$url;
//echo "<br>";
$pan = explode("/", $url);
$localIP = getHostByName(getHostName());
//var_dump($panel);

//koneksi database
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $conn = mysqli_connect('localhost', 'root', '', 'mamspp21_spp21');
    $bh = $pan[3];
    $bh1 = explode(".", $bh);
    $basehost = $bh1[0];
} elseif ($_SERVER['HTTP_HOST'] == $localIP) {
    $conn = mysqli_connect('localhost', 'root', '', 'u1461653_spp21');
    $bh = $pan[3];
    $bh1 = explode(".", $bh);
    $basehost = $bh1[0];
} elseif ($_SERVER['HTTP_HOST'] != "localhost") {
    $conn = mysqli_connect('localhost', 'mamspp21_khajar', '?5]tE=Uw@V2z', 'mamspp21_spp21');
    $bh = $pan[2];
    $bh1 = explode(".", $bh);
    $basehost = $bh1[0];
}

//   $conn = mysqli_connect('localhost', 'lawlessburgerbar_lbba', '22e9j=V9r#A_', 'lawlessburgerbar_lb1');
//     $bh = $pan[2];
//     $bh1 = explode(".", $bh);
//     $basehost = $bh1[0];


// echo $basehost;


// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
//mysqli_close($conn);

//$company = query("SELECT * FROM companypanel WHERE baseurl = 'centralfrozen' ")[0];

// var_dump($company);
// var_dump($basehost);
// if (isset($_SESSION['kodeoutlet'])) {

//     $outlet = $_SESSION['kodeoutlet'];

// kirim email
$mailer = query("SELECT * FROM mailer WHERE username1='cs@mamspp21.com'")[0];
$mailhost1 = $mailer['mailhost1'];
$username1 = $mailer['username1'];
$password1 = $mailer['password1'];
$setform1 = $mailer['setfrom1'];

// akhir kirim email
// }

date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tglindo = $date->format('Y-m-d');
$tglindo2 = $date->format('ymd');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// die;

function queryy($queryy)
{
    global $conn;
    $resultt = mysqli_query($conn, $queryy);
    $rowss = [];
    while ($roww = mysqli_fetch_assoc($resultt)) {
        $rowss[] = $roww;
    }
    return $rowss;
}

$year = date('Y');
$month = date('m');