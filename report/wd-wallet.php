<?php
include '../include/header.php';
$juhal = "WD Wallet SPP21";

$email = "spp21indonesia@gmail.com";

$cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
if (mysqli_num_rows($cekdata) < 1) {
    $saldo = 0;
} else {
    $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
    $saldo = $set['saldo'];
}

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


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="header-title"><?= $juhal ?></h4> -->

                                    <form action="models/input.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="wdwalletspp21" name="wdwalletspp21"
                                            class="form-control" value="wdwalletspp21" readonly="">
                                        <div class="row mb-3">
                                            <label for="saldospp21" class="col-4 col-form-label">Saldo Wallet SPP21<span
                                                    class="text-danger"> $</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="saldospp21"
                                                    name="saldospp21" readonly
                                                    value="<?= number_format($saldo, 2) ?>" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="keterangan" class="col-4 col-form-label">Keterangan<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input id="keterangan" name="keterangan" type="text"
                                                    placeholder="Keterangan WD Wallet" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jumlahwd" class="col-4 col-form-label">Jumlah WD<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="jumlahwd"
                                                    name="jumlahwd" placeholder="Jumlah WD" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                                    name="WDWalletspp21">Input</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end card -->
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