<?php
include '../include/header.php';
$e = "spp21indonesia@gmail.com";
$rebate = query("SELECT * FROM users WHERE email !='$e' ORDER BY id DESC");

$membercash = query("SELECT * FROM users WHERE email ='spp21indonesia@gmail.com' ORDER BY id DESC");
$sw = 0;
$sr = 0;
$sp = 0;


foreach ($membercash as $row) {
    $email = $row['email'];
    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldowallet = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
        $saldowallet = $set['saldo'];
    }
    //echo $email . ' - ' . $saldowallet . '<br>';
    $sw += $saldowallet;
}

foreach ($membercash as $row) {
    $email = $row['email'];
    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='REBATE' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldorebate = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='REBATE' ORDER BY id DESC LIMIT 1")[0];
        $saldorebate = $set['saldo'];
    }
    //echo $email . ' - ' . $saldowallet . '<br>';
    $sr += $saldorebate;
}

foreach ($membercash as $row) {
    $email = $row['email'];
    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='PROFIT' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldoprofit = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
        $saldoprofit = $set['saldo'];
    }
    //echo $email . ' - ' . $saldowallet . '<br>';
    $sp += $saldoprofit;
}

$totalcash = $sr + $sp + $sw;

$juhal = "Report";
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

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($sr) ?></h2>
                                        <h5>Rebate Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup">
                                            <?= number_format($sp) ?></h2>
                                        <h5>Bonus Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($sw) ?></h2>
                                        <h5>Wallet Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup">
                                            <?= number_format($totalcash) ?></h2>
                                        <h5>Cash Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Wallet Data</h4>

                                    <table id="datatable"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Rebate Saldo</th>
                                                <th>Bonus Saldo</th>
                                                <th>Wallet Saldo</th>
                                                <!-- <th>Detail</th> -->


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($member as $row) : ?>

                                            <tr>

                                                <td><?= $i ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td><?= $row["username"] ?></td>
                                                <td>
                                                    <?php
                                                        $email = $row["email"];
                                                        $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='REBATE' ");
                                                        if (mysqli_num_rows($cekdata) < 1) {
                                                            echo 0;
                                                        } else {
                                                            $dompet = query("SELECT * FROM wallet WHERE email = '$email' AND kategori='REBATE' ORDER BY id DESC LIMIT 1")[0];
                                                            echo number_format($dompet['saldo']);
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $email = $row["email"];
                                                        $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='PROFIT' ");
                                                        if (mysqli_num_rows($cekdata) < 1) {
                                                            echo 0;
                                                        } else {
                                                            $dompet = query("SELECT * FROM wallet WHERE email = '$email' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
                                                            echo number_format($dompet['saldo']);
                                                        }
                                                        ?>
                                                </td>

                                                <td>
                                                    <?php
                                                        $email = $row["email"];
                                                        $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
                                                        if (mysqli_num_rows($cekdata) < 1) {
                                                            echo 0;
                                                        } else {
                                                            $dompet = query("SELECT * FROM wallet WHERE email = '$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
                                                            echo number_format($dompet['saldo']);
                                                        }
                                                        ?>
                                                </td>
                                                <!-- <td> <span class="badge bg-primary">Detail</span></a></td> -->

                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

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