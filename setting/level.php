<?php
include '../include/header.php';
$level = query("SELECT * FROM levels");
$juhal = "Level Network";
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Data Level Network
                                    </h4>

                                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Level</th>
                                                <th>Share Profit</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($level as $row) : ?>

                                                <tr>

                                                    <td><?= $i ?></td>

                                                    <td><?= ucwords($row["nama_level"]) ?></td>
                                                    <td><?= $row["profit_sharing"] ?>%</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal<?= $row['id'] ?>">Edit</button>

                                                        <div id="con-close-modal<?= $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Detail Profile</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="models/edit.php" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" id="editlevel" name="editlevel" class="form-control" value="editlevel" readonly="">
                                                                        <input type="hidden" id="id" name="id" class="form-control" value="<?= $row['id'] ?>" readonly="">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label for="field-1" class="form-label">Level</label>
                                                                                        <input type="text" class="form-control" id="field-1" name="level" value="<?= ucwords($row["nama_level"]) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label for="field-2" class="form-label">Profit Sharing</label>
                                                                                        <input type="text" class="form-control" id="field-2" name="profit_sharing" value="<?= $row["profit_sharing"] ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-info waves-effect waves-light" name="EditLevel">Save</button>
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