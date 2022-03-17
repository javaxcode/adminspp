<?php
include '../include/header.php';
$member = query("SELECT * FROM usersnetwork ORDER BY id DESC");
$profit = query("SELECT * FROM wallet WHERE kategori = 'PROFIT' AND input!=0 AND email!='spp21indonesia@gmail.com' ORDER BY id DESC");

$juhal = "Share Profit";
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
                        <div class="col-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Data Share Profit</h4>

                                    <table id="datatable"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                                <th>Paket</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($member as $row) : ?>

                                            <tr>

                                                <td><?= $i ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td>
                                                    <?php if ($row['email']  != "spp21indonesia@gmail.com") : ?>
                                                    <?php if ($row['paket'] != "") : ?>

                                                    <button type="button"
                                                        class="btn btn-secondary btn-xs waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#con-close-modal<?= $row['id'] ?>">Share
                                                        Profit</button>

                                                    <div id="con-close-modal<?= $row['id'] ?>" class="modal fade"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Detail Share Profit</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="models/input.php" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" id="bagi-profit"
                                                                        name="bagi-profit" class="form-control"
                                                                        value="bagi-profit" readonly="">
                                                                    <input type="hidden" id="id" name="id"
                                                                        class="form-control" value="<?= $row['id'] ?>"
                                                                        readonly="">
                                                                    <input type="hidden" id="email" name="email"
                                                                        class="form-control"
                                                                        value="<?= $row['email'] ?>" readonly="">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="jumlahprofit"
                                                                                        class="form-label">Total Share
                                                                                        Profit (Rp.)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="jumlahprofit"
                                                                                        name="jumlahprofit">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary waves-effect"
                                                                            data-bs-dismiss="modal">Close</button> -->
                                                                        <button type="submit"
                                                                            class="btn btn-info waves-effect waves-light"
                                                                            name="Bagi-Profit">Input</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal -->

                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['paket'] != "") : ?>
                                                    <?php
                                                            if ($row['paket'] == "Basic") {
                                                                $warna = "info";
                                                            } else if ($row['paket'] == "Advanced") {
                                                                $warna = "primary";
                                                            } else if ($row['paket'] == "Expert") {
                                                                $warna = "success";
                                                            }
                                                            ?>
                                                    <button type="button"
                                                        class="btn btn-<?= $warna ?> btn-xs waves-effect waves-light"><?= $row["paket"] ?></button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['rank'] != "") : ?>
                                                    <?php
                                                            if ($row['rank'] == "Manager") {
                                                                $warna = "info";
                                                            } else if ($row['rank'] == "Senior M") {
                                                                $warna = "primary";
                                                            } else if ($row['rank'] == "Director") {
                                                                $warna = "success";
                                                            }
                                                            ?>
                                                    <button type="button"
                                                        class="btn btn-<?= $warna ?> btn-xs waves-effect waves-light"><?= $row["rank"] ?></button>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Data Sharing Profit</h4>

                                    <table id="datatable-buttons"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th>Email</th>
                                                <th>Profit</th>
                                                <!-- <th>Saldo Bonus</th> -->

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($profit as $row) : ?>

                                            <tr>

                                                <td><?= $i ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td><?= number_format($row["input"]) ?></td>
                                                <!-- <td><?= number_format($row["saldo"]) ?></td> -->

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