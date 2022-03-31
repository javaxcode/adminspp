<?php
include '../include/header.php';
if (isset($_POST["tampilkan"])) {
    $tanggal = date("Y-m-d", strtotime($_POST["tanggal"]));
    $deposit = query("SELECT * FROM deposit WHERE tang='$tanggal' AND status = 2 ORDER BY id DESC");

    $jumlahdfw = "SELECT SUM(deposit) AS total_dfw FROM deposit WHERE tang='$tanggal' AND status = 2 "; //perintah untuk menjumlahkan
    $hasildfw = mysqli_query($conn, $jumlahdfw); //melakukan query dengan varibel $jumlahkan
    $tdfw = mysqli_fetch_array($hasildfw); //menyimpan hasil query ke variabel $t
    $gtdeposit = $tdfw['total_dfw'];
} else {
    $deposit = query("SELECT * FROM deposit ORDER BY id DESC");

    $jumlahdfw = "SELECT SUM(deposit) AS total_dfw FROM deposit WHERE status = 2 "; //perintah untuk menjumlahkan
    $hasildfw = mysqli_query($conn, $jumlahdfw); //melakukan query dengan varibel $jumlahkan
    $tdfw = mysqli_fetch_array($hasildfw); //menyimpan hasil query ke variabel $t
    $gtdeposit = $tdfw['total_dfw'];
}

$juhal = "Deposit";
?>


<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>
    <div id="loadingWrapper" class="card w-100 position-absolute"
        style="display:none;background-color: #08080887;z-index: 9999;">
        <div class="card-body w-100 d-flex flex-column justify-content-center align-items-center" style="
    height: 100vh;">
            <i class="fas fa-dollar-sign fa-pulse fa-5x text-warning"></i>
            <br>
            <h4 class="text-white"><strong>Please wait..</strong></h4>
        </div>
    </div>
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
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-3"></i>
                                Total Deposit $ <?= number_format($gtdeposit, 2) ?></a>
                        </div>
                        <div class="col-sm-8">
                            <div class="float-end">
                                <form class="row g-2 align-items-center mb-2 mb-sm-0" action="" method="post">
                                    <div class="col-auto">
                                        <div class="d-flex">
                                            <label class="d-flex align-items-center">Date
                                                <input type="text" data-provide="datepicker" data-date-autoclose="true"
                                                    class="form-control" name="tanggal" ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="d-flex">
                                            <button type="submit" name="tampilkan"
                                                class="btn btn-primary btn-sm waves-effect waves-light">Show
                                                Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Data Deposit</h4>

                                    <table id="datatable"
                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Email</th>
                                                <!-- <th>Broker</th> -->
                                                <th>No Account</th>
                                                <th>Deposit</th>
                                                <!-- <th>Bank</th>
                                                <th>Total</th> -->
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($deposit as $row) : ?>
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
                                                <td><?= number_format($row["deposit"], 2) ?></td>
                                                <!-- <td><?= $row["bank"] ?></td>
                                                    <td><?= "<b>" . number_format($row["total"]) . " </b>" ?></td> -->
                                                <td>
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
                                                        ?>
                                                </td>
                                                <td class="actions">
                                                    <?php
                                                        $email = $row['email'];
                                                        $cekdata = mysqli_query($conn, "SELECT email FROM validasi WHERE email ='$email' ");
                                                        ?>

                                                    <?php if (mysqli_num_rows($cekdata) < 1) : ?>
                                                    <?php if ($row['no_akun'] == "First deposit") : ?>
                                                    <a href="make-account.php?email=<?= $row["email"] ?>"><button
                                                            type="button"
                                                            class="btn btn-success btn-xs waves-effect waves-light">Make
                                                            Account</button>
                                                        <?php endif; ?>
                                                        <?php else : ?>
                                                        <?php if ($row['status'] != 2) : ?>
                                                        <a href="models/edeposit.php?id=<?= $row["id"] ?>&status=2&email=<?= $row["email"] ?>"
                                                            onclick="document.querySelector('#loadingWrapper').style.display = 'flex'"><button
                                                                type=" button"
                                                                class="btn btn-success btn-xs waves-effect waves-light"><i
                                                                    class="mdi mdi-thumb-up"></i></button></a> |
                                                        <a href="models/delete.php?id=<?= $row["id"] ?>&tbl=deposit"><button
                                                                type="button"
                                                                onClick="if(confirm('Apakah anda yakin akan menghapus data ?')){return true}else{return false}"
                                                                class="btn btn-danger btn-xs waves-effect waves-light"><i
                                                                    class="mdi mdi-delete"></i></button></a> |
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] != 3) : ?>
                                                        <a href="models/edeposit.php?id=<?= $row["id"] ?>&status=3&email=<?= $row["email"] ?>"
                                                            onClick="document.querySelector('#loadingWrapper').style.display = 'flex'"><button
                                                                type=" button"
                                                                class="btn btn-warning btn-xs waves-effect waves-light">X</button></a>
                                                        <?php endif; ?>
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