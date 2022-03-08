<?php
$juhal = "Member";
include '../include/header.php';
?>


<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <?php include '../include/topbar.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include '../include/sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $date = new DateTime();
                    $tgl = $date->format('Y-m-d  H:i:s');
                    $tang = date('Y-m-d');
                    $jam = date('H:i:s');
                    $tanggal = $tang . " : " . $jam;

                    $jumlahp = "SELECT SUM(input) AS total_id FROM wallet WHERE email ='afsablenk@gmail.com' AND kategori='PROFIT' "; //perintah untuk menjumlahkan
                    $hasilp = mysqli_query($conn, $jumlahp); //melakukan query dengan varibel $jumlahkan
                    $tp = mysqli_fetch_array($hasilp); //menyimpan hasil query ke variabel $t
                    echo $tip = $tp['total_id'];

                    $jumlahp = "SELECT SUM(output) AS total_id FROM wallet WHERE email ='afsablenk@gmail.com' AND kategori='PROFIT' "; //perintah untuk menjumlahkan
                    $hasilp = mysqli_query($conn, $jumlahp); //melakukan query dengan varibel $jumlahkan
                    $tp = mysqli_fetch_array($hasilp); //menyimpan hasil query ke variabel $t
                    echo $top = $tp['total_id'];

                    $totalbonus = $tip - $top;

                    // $member = query("SELECT * FROM usersnetwork ");
                    // foreach ($member as $row) {
                    //     $id = $row['id'];
                    //     $email = strtolower($row['email']);
                    //     $level1 = strtolower($row['level1']);
                    //     $level2 = strtolower($row['level2']);
                    //     $level3 = strtolower($row['level3']);
                    //     $level4 = strtolower($row['level4']);
                    //     $level5 = strtolower($row['level5']);
                    //     $level6 = strtolower($row['level6']);
                    //     $level7 = strtolower($row['level7']);
                    //     $level8 = strtolower($row['level8']);
                    //     $level9 = strtolower($row['level9']);
                    //     /*query update*/
                    //     $query = "UPDATE usersnetwork SET                            
                    //         email = '$email',
                    //         level1 = '$level1',
                    //         level2 = '$level2',
                    //         level3 = '$level3',
                    //         level4 = '$level4',
                    //         level5 = '$level5',
                    //         level6 = '$level6',
                    //         level7 = '$level7',
                    //         level8 = '$level8',
                    //         level9 = '$level9'
                    //         WHERE id  = $id
                    //     ";
                    //     mysqli_query($conn, $query);
                    // }

                    // $email = "memberbaru@gmail.com";
                    // $aff = "fx411";


                    // $level1 = query("SELECT * FROM users WHERE username='$aff'")[0];
                    // $emaillevel1 = $level1['email'];
                    // $usernamelevel1 = $level1['username'];
                    // $aff1 = $level1['aff'];

                    // $level2 = query("SELECT * FROM users WHERE username='$aff1'")[0];
                    // $emaillevel2 = $level2['email'];
                    // $usernamelevel2 = $level2['username'];
                    // $aff2 = $level2['aff'];
                    // $level3 = query("SELECT * FROM users WHERE username='$aff2'")[0];
                    // $emaillevel3 = $level3['email'];
                    // $usernamelevel3 = $level3['username'];
                    // $aff3 = $level3['aff'];
                    // $level4 = query("SELECT * FROM users WHERE username='$aff3'")[0];
                    // $emaillevel4 = $level4['email'];
                    // $usernamelevel4 = $level4['username'];
                    // $aff4 = $level4['aff'];
                    // echo 'Daftar baru - ' . $email . '<br>';
                    // echo 'Level 1 - ' . $emaillevel1 . ' - ' . $usernamelevel1 . ' - ' . $aff1 . '<br>';
                    // echo 'Level 2 - ' . $emaillevel2 . ' - ' . $usernamelevel2 . ' - ' . $aff2 . '<br>';
                    // echo 'Level 3 - ' . $emaillevel3 . ' - ' . $usernamelevel3 . ' - ' . $aff3 . '<br>';
                    // echo 'Level 4 - ' . $emaillevel4 . ' - ' . $usernamelevel4 . ' - ' . $aff4 . '<br>';

                    // echo '<hr>';

                    // $aff = "kss21";
                    // $level1 = query("SELECT * FROM users WHERE username='$aff'")[0];
                    // $emaillevel1 = $level1['email'];
                    // $ia = query("SELECT * FROM usersnetwork WHERE email='$emaillevel1'")[0];
                    // $idaff = $ia['id'];
                    // $total = 10;

                    // for ($i = 1; $i < $total; $i++) {
                    //     $level = query("SELECT * FROM users WHERE username='$aff'")[0];
                    //     $emaillevel = $level['email'];
                    //     $usernamelevel = $level['username'];
                    //     if ($usernamelevel == NULL) {
                    //         $aff = "spp21";
                    //     } else {
                    //         $aff = $level['aff'];
                    //     }


                    // echo 'Level ' . $i . ' - ' . $emaillevel . ' - ' . $usernamelevel . ' - ' . $aff . '<br>';
                    // echo $i;


                    // $leveltingkat = 'Level' . $i;

                    /*query update*/
                    // $query = "UPDATE usersnetwork SET
                    //     $leveltingkat = '$aff'
                    //     WHERE id  = $idaff
                    // ";
                    // mysqli_query($conn, $query);
                    // }

                    // $member = query("SELECT * FROM usersnetwork");

                    // foreach ($member as $row) {
                    //     // $user_id = $row['id'];
                    //     $email = $row['email'];
                    //     $aff = $row['aff'];
                    //     $datamember = query("SELECT * FROM users WHERE email = '$email'")[0];
                    //     $id = $datamember['id'];
                    // foreach ($datamember as $row1) {
                    // echo $user_id . ' - ' . $row['email'] . ' - ' . $datamember['user_id'];
                    // }
                    // echo "<br>";

                    /*query update*/
                    // $query = "UPDATE users SET
                    //     aff = '$aff'
                    //     WHERE id  = $id
                    // ";
                    // mysqli_query($conn, $query);

                    /*query input*/
                    // $query = "INSERT INTO usersnetwork 
                    //     VALUES 
                    //     ('','$email','','SPP21','SPP21','SPP21','SPP21','SPP21','SPP21','SPP21','SPP21','SPP21','')
                    // ";
                    // mysqli_query($conn, $query);
                    // }

                    // $email = "adi.suryaprimus@gmail.com";
                    // $un = query("SELECT email,username,aff FROM users WHERE email='$email'")[0];
                    // $memberusername = $un['username'];
                    // $aff = $un['aff'];
                    // $jumlahprofit = 1000000;

                    // $kategori = "PROFIT";


                    // $rank = query("SELECT paket FROM usersnetwork WHERE email='$email'")[0];
                    // $rankmember = $rank['paket'];
                    // if ($rankmember == "Advanced") {
                    //     $profitmember = ($jumlahprofit * 10) / 100;
                    //     $profispp21 = ($jumlahprofit * 10) / 100;
                    // } else if ($rankmember == "Expert") {
                    //     $profitmember = ($jumlahprofit * 15) / 100;
                    //     $profispp21 = ($jumlahprofit * 5) / 100;
                    // } else if ($rankmember == "Basic") {
                    //     $profitmember = 0;
                    //     $profispp21 = ($jumlahprofit * 20) / 100;
                    // }

                    // $total = 10;

                    // for ($i = 1; $i < $total; $i++) {
                    //     $lvl = "level" . $i;
                    //     $lvl1 = "level " . $i;
                    //     $ambillevelaffiliasi = query("SELECT * FROM usersnetwork WHERE email='$email' ")[0];
                    //     $levelaff = $ambillevelaffiliasi[$lvl];
                    //     $ambillevels = query("SELECT profit_sharing FROM levels WHERE nama_level='$lvl1' ")[0];
                    //     $levelshare = $ambillevels['profit_sharing'];

                    //     $sharingprofit = ($jumlahprofit * $levelshare) / 100;

                    //     if ($levelaff != "kss21") {
                    //         $elvlaff = query("SELECT email,aff FROM users WHERE username='$levelaff'")[0];
                    //         $emailaff = $elvlaff['email'];

                    //         $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$emailaff' ");
                    //         if (mysqli_num_rows($cekdata) < 1) {
                    //             $saldo = 0;
                    //         } else {
                    //             $set = query("SELECT * FROM wallet WHERE email ='$emailaff' ORDER BY id DESC LIMIT 1")[0];
                    //             $saldo = $set['saldo'];
                    //         }

                    //         $totalsaldo = $saldo + $sharingprofit;
                    //         $keterangan = "Share Profit Level " . $i . ' - ' . $memberusername;

                    //         echo 'Level ' . $i . ' - ' . $emailaff . ' - ' . $levelaff . ' - ' . $levelshare . ' - ' . $sharingprofit . ' - ' . $totalsaldo . '<br>';

                    //         /*query insert data*/
                    //         $query = "INSERT INTO wallet 
                    //         VALUES 
                    //             ('','$emailaff','$tang','$jam','$kategori','$keterangan','$sharingprofit','0','$totalsaldo')
                    //         ";
                    //         mysqli_query($conn, $query);
                    //     } else {
                    //         $usernamelevelaff = "spp21";
                    //         $elvlaff = query("SELECT email,aff FROM users WHERE username='$usernamelevelaff'")[0];
                    //         $emailaff = $elvlaff['email'];

                    //         $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$emailaff' ");
                    //         if (mysqli_num_rows($cekdata) < 1) {
                    //             $saldo = 0;
                    //         } else {
                    //             $set = query("SELECT * FROM wallet WHERE email ='$emailaff' ORDER BY id DESC LIMIT 1")[0];
                    //             $saldo = $set['saldo'];
                    //         }
                    //         $totalsaldo = $saldo + $sharingprofit;
                    //         $keterangan = "Share Profit Level " . $i . ' - ' . $memberusername;

                    //         echo 'Level ' . $i . ' - ' . $emailaff . ' - ' . $usernamelevelaff . ' - ' . $levelshare . ' - ' . $sharingprofit . ' - ' . $totalsaldo . '<br>';
                    //         /*query insert data*/
                    //         $query = "INSERT INTO wallet 
                    //         VALUES 
                    //             ('','$emailaff','$tang','$jam','$kategori','$keterangan','$sharingprofit','0','$totalsaldo')
                    //         ";
                    //         mysqli_query($conn, $query);
                    //     }
                    // }

                    // echo 'Share SPP21 ' . $profispp21 . '<br>';
                    // /*query insert data profit perusahaan*/
                    // $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='spp21indonesia@gmail.com' ");
                    // if (mysqli_num_rows($cekdata) < 1) {
                    //     $saldo = 0;
                    // } else {
                    //     $set = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' ORDER BY id DESC LIMIT 1")[0];
                    //     $saldo = $set['saldo'];
                    // }
                    // $totalsaldo = $saldo + $profispp21;
                    // $keterangan = "Share Profit " . $memberusername;
                    // /*query insert data*/
                    // $query = "INSERT INTO wallet 
                    // VALUES 
                    //     ('','$emailaff','$tang','$jam','$kategori','$keterangan','$profispp21','0','$totalsaldo')
                    // ";
                    // mysqli_query($conn, $query);


                    // echo $email . ' - ' . $rankmember . ' - ' . $profitmember . '<br>';
                    // /*query insert data profit perusahaan*/
                    // $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' ");
                    // if (mysqli_num_rows($cekdata) < 1) {
                    //     $saldo = 0;
                    // } else {
                    //     $set = query("SELECT * FROM wallet WHERE email ='$email' ORDER BY id DESC LIMIT 1")[0];
                    //     $saldo = $set['saldo'];
                    // }
                    // $totalsaldo = $saldo + $profitmember;
                    // $keterangan = "Share Profit";
                    // /*query insert data*/
                    // $query = "INSERT INTO wallet 
                    // VALUES 
                    //     ('','$email','$tang','$jam','$kategori','$keterangan','$profitmember','0','$totalsaldo')
                    // ";
                    // mysqli_query($conn, $query);

                    ?>

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include '../include/footer.php'; ?>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="../assets/libs/morris.js06/morris.min.js"></script>
    <script src="../assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboar init js-->
    <script src="../assets/js/pages/dashboard.init.js"></script>

    <!-- App js-->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>