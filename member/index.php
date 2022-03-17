<?php
include '../include/header.php';
$member = query("SELECT * FROM users ORDER BY id DESC");

$juhal = "Member";
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

                    <!-- <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($tid) ?></h2>
                                        <h5>Total Member</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup">
                                            <?= number_format($ta) ?></h2>
                                        <h5>Total Account</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-primary" data-plugin="counterup">
                                            <?= number_format($gtdeposit) ?></h2>
                                        <h5>Total Deposit</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="text-center">
                                        <h2 class="fw-normal text-pink" data-plugin="counterup">
                                            <?= number_format($gtwithdrawal) ?></h2>
                                        <h5>Total Withdrawal</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Member List</h4>

                                    <table id="datatable"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Affiliasi</th>
                                                <th>Nama</th>
                                                <!-- <th>Hp</th> -->
                                                <th>Profil</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($member as $row) : ?>

                                            <tr>

                                                <td><?= $i ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['aff'] ?></td>
                                                <td>
                                                    <?php
                                                        $user_id = $row['id'];
                                                        $datamember = query("SELECT * FROM usermetas WHERE user_id = '$user_id'")[0];
                                                        ?>
                                                    <?= $datamember['nama_depan'] . ' ' . $datamember['nama_belakang'] ?>
                                                </td>
                                                <!-- <td><?= $datamember['telepon'] ?></td> -->
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#con-close-modal<?= $user_id ?>">Detail</button>

                                                    <div id="con-close-modal<?= $user_id ?>" class="modal fade"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Detail Profile</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="field-1"
                                                                                    class="form-label">Nama
                                                                                    Depan</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="field-1"
                                                                                    value="<?= $datamember['nama_depan'] ?>"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="field-2"
                                                                                    class="form-label">Nama
                                                                                    Belakang</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="field-2"
                                                                                    value="<?= $datamember['nama_belakang'] ?>"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="field-4"
                                                                                    class="form-label">TTL</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="field-4"
                                                                                    value="<?= $datamember['tgl_lahir'] ?>"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <?php if ($datamember['jenis_kelamin'] != "P") {
                                                                                        $jk = "Laki-laki";
                                                                                    } else {
                                                                                        $jk = "Perempuan";
                                                                                    }  ?>
                                                                                <label for="field-5"
                                                                                    class="form-label">Jenis
                                                                                    Kelamin</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="field-5" value="<?= $jk ?>"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="field-6"
                                                                                    class="form-label">Contact</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="field-6"
                                                                                    value="<?= $datamember['telepon'] ?>"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="">
                                                                                <label for="field-7"
                                                                                    class="form-label">Address</label>
                                                                                <textarea class="form-control"
                                                                                    id="field-7"
                                                                                    readonly><?= $datamember['alamat'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary waves-effect"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <!-- <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td class="actions">
                                                    <!-- <?php
                                                                $email = $row['email'];
                                                                $cekdata = mysqli_query($conn, "SELECT email FROM validasi WHERE email ='$email' ");
                                                                ?>
                                                    <?php if (mysqli_num_rows($cekdata) < 1) : ?>
                                                    <a href="make-account.php?id=<?= $row["id"] ?>">
                                                        <button type="button"
                                                            class="btn btn-success btn-xs waves-effect waves-light">Make
                                                            Account</button> |
                                                        <?php endif; ?> -->
                                                    <a href="add/hapususer.php?id=<?= $row["id"] ?>"><button
                                                            type="button"
                                                            onClick="if(confirm('Apakah anda yakin akan menghapus data ?')){return true}else{return false}"
                                                            class="btn btn-danger btn-xs waves-effect waves-light"><i
                                                                class="mdi mdi-delete"></i></button></a>
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