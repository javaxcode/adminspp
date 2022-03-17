<?php
include '../include/header.php';
$juhal = "Make Account";

$email = $_GET["email"];
$datauser = query("SELECT email,id,aff FROM users WHERE email='$email'")[0];
$iduser = $datauser['id'];
$email = $datauser['email'];
$aff = $datauser['aff'];
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
                                    <h4 class="header-title">Make Account Member</h4>

                                    <form action="models/input.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="inputakun" name="inputakun" class="form-control"
                                            value="inputakun" readonly="">
                                        <input type="hidden" id="aff" name="aff" class="form-control"
                                            value="<?= $aff ?>" readonly="">
                                        <div class="row mb-3">
                                            <label for="email" class="col-4 col-form-label">Email<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="email" name="email"
                                                    value="<?= $email ?>" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="noakun" class="col-4 col-form-label">No Account<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input id="noakun" name="noakun" type="text" placeholder="No Account"
                                                    required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="passwordinvestor" class="col-4 col-form-label">Password
                                                Investor<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required placeholder="Password Investor"
                                                    class="form-control" id="passwordinvestor"
                                                    name="passwordinvestor" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="server" class="col-4 col-form-label">Server<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="server"
                                                    name="server" placeholder="Server" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                                    name="InputRank">Input</button>

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