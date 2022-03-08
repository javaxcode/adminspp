<?php
include '../include/header.php';
$withdraw = query("SELECT * FROM withdrawal ORDER BY id DESC");
$juhal = "Withdrawal";
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
                                    <h4 class="mt-0 header-title">Data Withdrawal</h4>

                                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Email</th>
                                                <!-- <th>Broker</th> -->
                                                <th>No Account</th>
                                                <th>WD</th>
                                                <th>Bank</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($withdraw as $row) : ?>
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
                                                    <td><?= $row["email"] ?></td>
                                                    <!-- <td></td> -->
                                                    <td><?= $row["no_akun"] ?></td>
                                                    <td><?= $row["withdrawal"] ?></td>
                                                    <td><?= $row["bank"] ?></td>
                                                    <td><?= "<b>" . number_format($row["total"]) . " </b>" ?></td>
                                                    <td>
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
                                                        } else {
                                                            echo $c;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="actions">
                                                        <?php if ($row['status'] != 2) : ?>
                                                            <a href="models/ewithdrawal.php?id=<?= $row["id"] ?>&status=2"><button type=" button" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-thumb-up"></i></button></a> |
                                                            <a href="models/delete.php?id=<?= $row["id"] ?>&tbl=withdrawal"><button type="button" onClick="if(confirm('Apakah anda yakin akan menghapus data ?')){return true}else{return false}" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-delete"></i></button></a> |
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] != 3) : ?>
                                                            <a href="models/ewithdrawal.php?id=<?= $row["id"] ?>&status=3"><button type=" button" class="btn btn-warning btn-xs waves-effect waves-light">X</button></a>
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