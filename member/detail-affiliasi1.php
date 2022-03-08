<?php
include '../include/header.php';
$member = query("SELECT * FROM usersnetwork ORDER BY id DESC");

$juhal = "Affiliasi";
?>


<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

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
                    $email = $_GET["email"];
                    $datauser = query("SELECT * FROM users WHERE email='$email'")[0];
                    $iduser = $datauser['id'];
                    $username = $datauser['username'];
                    $paketuser = query("SELECT * FROM usersnetwork WHERE email='$email'")[0];

                    if ($paketuser['paket'] == "Basic") {
                        $warna = "info";
                    } else if ($paketuser['paket'] == "Advanced") {
                        $warna = "primary";
                    } else if ($paketuser['paket'] == "Expert") {
                        $warna = "success";
                    }

                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title mt-0 mb-3">Downline Network <?= $username ?> <span class="badge badge-soft-<?= $warna ?>">Paket <?= $paketuser['paket'] ?></span></h4>
                                    <?php if ($paketuser['paket'] != "") : ?>
                                        <div id="basicTree">
                                            <?php $total = 10; ?>
                                            <?php for ($i = 1; $i < $total; $i++) : ?>
                                                <ul>
                                                    <?php $datalevel . $i = query("SELECT * FROM usersnetwork WHERE level1='$username' AND email !='spp21indonesia@gmail.com' "); ?>
                                                    <?php foreach ($datalevel as $row) : ?>
                                                        <?php
                                                        $email1 = $row1['email'];
                                                        $datau1 = query("SELECT * FROM users WHERE email='$email1' ")[0];
                                                        if ($row1['paket'] == "Basic") {
                                                            $warna = "info";
                                                        } else if ($row1['paket'] == "Advanced") {
                                                            $warna = "primary";
                                                        } else if ($row1['paket'] == "Expert") {
                                                            $warna = "success";
                                                        }
                                                        if ($row1['rank'] == "Basic") {
                                                            $warna = "info";
                                                        } else if ($row1['rank'] == "Advanced") {
                                                            $warna = "primary";
                                                        } else if ($row1['rank'] == "Expert") {
                                                            $warna = "success";
                                                        }
                                                        ?>
                                                        <li data-jstree='{"opened":true}'>LEVEL 1 : <?= $datau1['username'] . ' - ' . $row1['email'] ?> - <span class="badge badge-soft-<?= $warna ?>">Paket <?= $row1['paket'] ?></span> - <span class="badge badge-soft-<?= $warna ?>">Rank <?= $row1['rank'] ?></span>

                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endfor; ?>
                                        </div>
                                    <?php else : ?>
                                        <h2><span class="badge badge-soft-danger">Paket Member Belum Aktif</span></h2>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Jumlah Downline Network </h4>
                                    <?php
                                    $aff = $username;
                                    $total = 10;
                                    ?>
                                    <?php for ($i = 1; $i < $total; $i++) : ?>
                                        <?php
                                        $level = "level" . $i;
                                        $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE $level='$username' "; //perintah untuk menjumlahkan
                                        $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                                        $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                                        $tid = $td['total_id'];
                                        ?>
                                        Level <?= $i ?> : <?= $tid; ?> Member
                                        <br>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end row -->

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

    <?php include '../include/script.php'; ?>
</body>

</html>