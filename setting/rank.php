<?php
include '../include/header.php';
$rank = query("SELECT * FROM ranks");
$juhal = "Ranking";
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Data Rank</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Rank</th>
                                                    <th>Profit Sharing</th>
                                                    <th>Direct Sponsor</th>
                                                    <th>Direct Omset</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($rank as $row) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row["nama_rank"] ?></td>
                                                        <td><?= $row["profit_sharing"] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['id'] == 1) {
                                                                $kata = "Direct Sponsor";
                                                            } else if ($row['id'] == 2) {
                                                                $kata = "Manager";
                                                            } else if ($row['id'] == 3) {
                                                                $kata = "Senior M";
                                                            }
                                                            ?>
                                                            <?= $row["direct_sponsor"] . ' ' . $kata ?>
                                                        </td>
                                                        <td>$<?= number_format($row["direct_omset"]) ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal<?= $row['id'] ?>">Edit</button>

                                                            <div id="con-close-modal<?= $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Detail Rank</h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="models/edit.php" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" id="rank" name="rank" class="form-control" value="rank" readonly="">
                                                                            <input type="hidden" id="id" name="id" class="form-control" value="<?= $row['id'] ?>" readonly="">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="nama_rank" class="form-label">Rank</label>
                                                                                            <input type="text" class="form-control" id="nama_rank" name="nama_rank" value="<?= ucwords($row["nama_rank"]) ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="profit_sharing" class="form-label">Profit Sharing</label>
                                                                                            <input type="text" class="form-control" id="profit_sharing" name="profit_sharing" value="<?= $row["profit_sharing"] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="direct_sponsor" class="form-label">Direct Sponsor</label>
                                                                                            <input type="text" class="form-control" id="direct_sponsor" name="direct_sponsor" value="<?= ucwords($row["direct_sponsor"]) ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="direct_omset" class="form-label">Direct Omset</label>
                                                                                            <input type="text" class="form-control" id="direct_omset" name="direct_omset" value="<?= $row["direct_omset"] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-info waves-effect waves-light" name="Rank">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal -->
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

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Input Rank</h4>

                                    <form action="models/input.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="inputrank" name="inputrank" class="form-control" value="inputrank" readonly="">
                                        <div class="row mb-3">
                                            <label for="nama_rank" class="col-4 col-form-label">Rank<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="nama_rank" name="nama_rank" placeholder="Nama Rank" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="profit_sharing" class="col-4 col-form-label">Profit Sharing<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input id="profit_sharing" name="profit_sharing" type="text" placeholder="Password" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="direct_sponsor" class="col-4 col-form-label">Direct Sponsor<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required placeholder="Direct Sponsor" class="form-control" id="direct_sponsor" name="direct_sponsor" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="direct_omset" class="col-4 col-form-label">Direct Omset<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" required class="form-control" id="direct_omset" name="direct_omset" placeholder="Direct Omset" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="InputRank">Input</button>

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