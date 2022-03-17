<?php
include '../include/header.php';

if (isset($_POST["rebate"])) {
    $spp21cash = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='REBATE' ORDER BY id DESC");
    $jutab = "Detail Rebate";
} elseif (isset($_POST["profit"])) {
    $spp21cash = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='PROFIT' ORDER BY id DESC");
    $jutab = "Detail Bonus";
} elseif (isset($_POST["wallet"])) {
    $spp21cash = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='WALLET' ORDER BY id DESC");
    $jutab = "Detail Wallet";
} else {
    $spp21cash = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' ORDER BY id DESC");
    $jutab = "Detail";
}

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

$juhal = "Wallet SPP21";
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h5>Rebate SPP21 ($)</h5>
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($sr) ?></h2>
                                        <form action="" method="post">
                                            <button type="submit" name="rebate"
                                                class="btn btn-info btn-xs waves-effect waves-light">Detail</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h5>Bonus SPP21 ($)</h5>
                                        <h2 class="fw-normal text-pink" data-plugin="counterup">
                                            <?= number_format($sp, 2) ?></h2>
                                        <form action="" method="post">
                                            <button type="submit" name="profit"
                                                class="btn btn-info btn-xs waves-effect waves-light">Detail</button>
                                        </form>
                                        <?php if ($sp != 0) : ?>
                                        <br>
                                        <form action="models/input.php" method="post">

                                            <button type="submit" name="klaimprofitspp21"
                                                class="btn btn-success btn-xs waves-effect waves-light">Klaim
                                                Bonus</button>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h5>Wallet SPP21 ($)</h5>
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($sw, 2) ?></h2>
                                        <form action="" method="post">
                                            <button type="submit" name="wallet"
                                                class="btn btn-info btn-xs waves-effect waves-light">Detail</button>
                                        </form>
                                        <?php if ($sw != 0) : ?>
                                        <br>
                                        <a href="wd-wallet"><button type="button"
                                                class="btn btn-success btn-xs waves-effect waves-light">WD
                                                Wallet</button></a>
                                        <?php endif; ?>
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

                                    <h4 class="mt-0 header-title"><?= $jutab; ?></h4>

                                    <table id="datatable"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Keterangan</th>
                                                <th>Input $</th>
                                                <th>Output $</th>
                                                <th>Saldo $</th>
                                                <!-- <th>Detail</th> -->


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($spp21cash as $row) : ?>

                                            <tr>

                                                <td><?= $i ?></td>
                                                <td>
                                                    <?php
                                                        $t = $row['tang'];
                                                        $ta = substr($t, 8, 2);
                                                        $bu = substr($t, 5, 2);
                                                        $tah = substr($t, 0, 4);
                                                        if ($bu === '01') {
                                                            $bul = "Jan";
                                                        } elseif ($bu === '02') {
                                                            $bul = "Feb";
                                                        } elseif ($bu === '03') {
                                                            $bul = "Maret";
                                                        } elseif ($bu === '04') {
                                                            $bul = "April";
                                                        } elseif ($bu === '05') {
                                                            $bul = "Mei";
                                                        } elseif ($bu === '06') {
                                                            $bul = "Juni";
                                                        } elseif ($bu === '07') {
                                                            $bul = "Juli";
                                                        } elseif ($bu === '08') {
                                                            $bul = "Agust";
                                                        } elseif ($bu === '09') {
                                                            $bul = "Sept";
                                                        } elseif ($bu === '10') {
                                                            $bul = "Okt";
                                                        } elseif ($bu === '11') {
                                                            $bul = "Nov";
                                                        } else {
                                                            $bul = "Des";
                                                        }
                                                        echo $ta . '-' . $bul . '-' . $tah . ' || ' . substr($row["jam"], 0, 5)
                                                        ?>
                                                </td>
                                                <td><?= $row["keterangan"] ?></td>
                                                <td><?= number_format($row["input"], 2) ?></td>
                                                <td><?= number_format($row["output"], 2) ?></td>
                                                <td><?= number_format($row["saldo"], 2) ?></td>
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