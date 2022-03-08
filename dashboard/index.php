<?php
include '../include/header.php';
$member = query("SELECT * FROM users ORDER BY id DESC");

$jumlahd = "SELECT COUNT(id) AS total_id FROM users "; //perintah untuk menjumlahkan
$hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
$td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
$tid = $td['total_id'];

$jumlahak = "SELECT COUNT(id) AS total_ak FROM validasi "; //perintah untuk menjumlahkan
$hasilak = mysqli_query($conn, $jumlahak); //melakukan query dengan varibel $jumlahkan
$tak = mysqli_fetch_array($hasilak); //menyimpan hasil query ke variabel $t
$ta = $tak['total_ak'];

$jumlahdfw = "SELECT SUM(deposit) AS total_dfw FROM deposit WHERE status = 2 "; //perintah untuk menjumlahkan
$hasildfw = mysqli_query($conn, $jumlahdfw); //melakukan query dengan varibel $jumlahkan
$tdfw = mysqli_fetch_array($hasildfw); //menyimpan hasil query ke variabel $t
$gtdeposit = $tdfw['total_dfw'];

$jumlahwdfw = "SELECT SUM(withdrawal) AS total_wdfw FROM withdrawal WHERE status = 2 "; //perintah untuk menjumlahkan
$hasilwdfw = mysqli_query($conn, $jumlahwdfw); //melakukan query dengan varibel $jumlahkan
$twdfw = mysqli_fetch_array($hasilwdfw); //menyimpan hasil query ke variabel $t
$gtwithdrawal = $twdfw['total_wdfw'];

$deposit = query("SELECT * FROM deposit ORDER BY id DESC LIMIT 5");
$withdraw = query("SELECT * FROM withdrawal ORDER BY id DESC LIMIT 5");
$validasi = query("SELECT * FROM validasi ORDER BY id DESC LIMIT 5");

$juhal = "Dashboard";
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
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup"><?= number_format($tid) ?></h2>
                                        <h5>Total Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup"><?= number_format($ta) ?></h2>
                                        <h5>Total Account</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup"><?= number_format($gtdeposit) ?></h2>
                                        <h5>Total Deposit</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup"><?= number_format($gtwithdrawal) ?></h2>
                                        <h5>Total Withdrawal</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND paket=''"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tmnp = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?paket=nonpaket">
                                            <h2 class="fw-normal text-primary" data-plugin="counterup"><?= number_format($tmnp) ?></h2>
                                            <h5>Member Non PAKET</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND paket='Basic'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tbasic = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?paket=Basic">
                                            <h2 class="fw-normal text-pink" data-plugin="counterup"><?= number_format($tbasic) ?></h2>
                                            <h5>BASIC</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND paket='Advanced'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tadvanced = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?paket=Advanced">
                                            <h2 class="fw-normal text-warning" data-plugin="counterup"><?= number_format($tadvanced) ?></h2>
                                            <h5>ADVANCED</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND paket='Expert'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $texpert = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?paket=Expert">
                                            <h2 class="fw-normal text-info" data-plugin="counterup"><?= number_format($texpert) ?></h2>
                                            <h5>EXPERT</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND rank=''"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tmnr = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?rank=nonrank">
                                            <h2 class="fw-normal text-primary" data-plugin="counterup"><?= number_format($tmnr) ?></h2>
                                            <h5>Member Non RANK</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND rank='Manager'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tmanager = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?rank=Manager">
                                            <h2 class="fw-normal text-pink" data-plugin="counterup"><?= number_format($tmanager) ?></h2>
                                            <h5>MANAGER</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND rank='Senior M'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tsmanager = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?rank=Senior">
                                            <h2 class="fw-normal text-warning" data-plugin="counterup"><?= number_format($tsmanager) ?></h2>
                                            <h5>SENIOR MANAGER</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <?php
                            $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE email != 'spp21indonesia@gmail.com' AND rank='Director'"; //perintah untuk menjumlahkan
                            $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                            $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                            $tdirector = $td['total_id'];
                            ?>
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <a href="../member/affiliasi.php?rank=Director">
                                            <h2 class="fw-normal text-info" data-plugin="counterup"><?= number_format($tdirector) ?></h2>
                                            <h5>DIRECTOR</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Account Validation</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Akun</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($validasi as $row) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row["no_akun"] ?></td>
                                                        <td><a href="../layanan/validasi-akun">
                                                                <?php
                                                                $p = "<span class='badge bg-primary'>Proses</span>";
                                                                $s = "<span class='badge bg-success'>Sukses</span>";
                                                                $g = "<span class='badge bg-danger'>Gagal</span>";
                                                                if ($row['status'] == '1') {

                                                                    echo $p;
                                                                } elseif ($row['status'] == '2') {

                                                                    echo $s;
                                                                } elseif ($row['status'] == '3') {
                                                                    echo $g;
                                                                }
                                                                ?></a>
                                                        </td>

                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Deposit</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Akun</th>
                                                    <th>Deposit</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($deposit as $row) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row["no_akun"] ?></td>
                                                        <td>$<?= number_format($row["deposit"], 2) ?></td>
                                                        <td><a href="../layanan/deposit">
                                                                <?php
                                                                $p = "<span class='badge bg-primary'>Proses</span>";
                                                                $s = "<span class='badge bg-success'>Sukses</span>";
                                                                $g = "<span class='badge bg-danger'>Gagal</span>";
                                                                if ($row['status'] == '1') {

                                                                    echo $p;
                                                                } elseif ($row['status'] == '2') {

                                                                    echo $s;
                                                                } elseif ($row['status'] == '3') {
                                                                    echo $g;
                                                                }
                                                                ?></a>
                                                        </td>

                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Withdrawal</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Akun</th>
                                                    <th>Withdrawal</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($withdraw as $row) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row["no_akun"] ?></td>
                                                        <td>$<?= number_format($row["withdrawal"], 2) ?></td>
                                                        <td><a href="../layanan/withdrawal">
                                                                <?php
                                                                $p = "<span class='badge bg-primary'>Proses</span>";
                                                                $s = "<span class='badge bg-success'>Sukses</span>";
                                                                $g = "<span class='badge bg-danger'>Gagal</span>";
                                                                $c = "<span class='badge bg-warning'>Confirm</span>";
                                                                if ($row['status'] == '1') {

                                                                    echo $p;
                                                                } elseif ($row['status'] == '2') {

                                                                    echo $s;
                                                                } elseif ($row['status'] == '3') {
                                                                    echo $g;
                                                                } elseif ($row['status'] == '4') {
                                                                    echo $c;
                                                                }
                                                                ?></a>
                                                        </td>

                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

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