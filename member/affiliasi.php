<?php
include '../include/header.php';


if (isset($_GET["paket"])) {
    $paket = $_GET["paket"];
    if ($_GET["paket"] == "nonpaket") {
        $member = query("SELECT * FROM usersnetwork WHERE paket='' ORDER BY id DESC");
    } elseif ($_GET["paket"] == $paket) {
        $member = query("SELECT * FROM usersnetwork WHERE paket='$paket' ORDER BY id DESC");
    }
} elseif (isset($_GET["rank"])) {
    $rank = $_GET["rank"];
    if ($_GET["rank"] == "nonrank") {
        $member = query("SELECT * FROM usersnetwork WHERE rank='' ORDER BY id DESC");
    } elseif ($_GET["rank"] == $rank) {
        if ($rank != "Senior") {
            $member = query("SELECT * FROM usersnetwork WHERE rank='$rank' ORDER BY id DESC");
        } else {
            $member = query("SELECT * FROM usersnetwork WHERE rank='Senior M' ORDER BY id DESC");
        }
    }
} else {
    $member = query("SELECT * FROM usersnetwork ORDER BY id DESC");
}





$juhal = "Affiliate";
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
                                    <h4 class="mt-0 header-title">Data Affiliate</h4>

                                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Paket</th>
                                                <th>Rank</th>
                                                <th>Lvl1</th>
                                                <th>Lvl2</th>
                                                <th>Lvl3</th>
                                                <th>Lvl4</th>
                                                <th>Lvl5</th>
                                                <th>Lvl6</th>
                                                <th>Lvl7</th>
                                                <th>Lvl8</th>
                                                <th>Lvl9</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($member as $row) : ?>

                                                <tr>

                                                    <td><?= $i ?></td>
                                                    <td><a href="detail-affiliasi.php?email=<?= $row["email"] ?>"><?= $row["email"] ?></a></td>
                                                    <td>
                                                        <?php if ($row['email'] != "spp21indonesia@gmail.com") : ?>
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
                                                                <button type="button" class="btn btn-<?= $warna ?> btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#standard-modal<?= $row['id'] ?>"><?= $row["paket"] ?></button>

                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-secondary btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#standard-modal<?= $row['id'] ?>">Edit</button>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><?= $row["paket"] ?></button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row['email'] != "spp21indonesia@gmail.com") : ?>
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
                                                                <button type="button" class="btn btn-<?= $warna ?> btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#standard-modal<?= $row['id'] ?>"><?= $row["rank"] ?></button>
                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-secondary btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#standard-modal<?= $row['id'] ?>">Edit</button>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-success btn-xs waves-effect waves-light"><?= $row["rank"] ?></button>
                                                        <?php endif; ?>

                                                        <!-- Standard modal content -->
                                                        <div id="standard-modal<?= $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="standard-modalLabel">Detail Affiliasi <?= $row["email"] ?></h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="models/edit.php" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" id="affiliasi" name="affiliasi" class="form-control" value="affiliasi" readonly="">
                                                                        <input type="hidden" id="id" name="id" class="form-control" value="<?= $row['id'] ?>" readonly="">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label for="paket" class="form-label">Paket</label>
                                                                                        <select id="paket" name="paket" class="form-select" required="">
                                                                                            <option value="<?= ucwords($row["paket"]) ?>"><?= ucwords($row["paket"]) ?></option>
                                                                                            <option value="Basic">Basic</option>
                                                                                            <option value="Advanced">Advanced</option>
                                                                                            <option value="Expert">Expert</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label for="rank" class="form-label">Rank</label>
                                                                                        <select id="rank" name="rank" class="form-select" required="">
                                                                                            <option value="<?= ucwords($row["rank"]) ?>"><?= ucwords($row["rank"]) ?></option>
                                                                                            <option value="Manager">Manager</option>
                                                                                            <option value="Senior M">Senior M</option>
                                                                                            <option value="Director">Director</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-info waves-effect waves-light" name="Affiliasi">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    </td>
                                                    <td><?= $row["level1"] ?></td>
                                                    <td><?= $row["level2"] ?></td>
                                                    <td><?= $row["level3"] ?></td>
                                                    <td><?= $row["level4"] ?></td>
                                                    <td><?= $row["level5"] ?></td>
                                                    <td><?= $row["level6"] ?></td>
                                                    <td><?= $row["level7"] ?></td>
                                                    <td><?= $row["level8"] ?></td>
                                                    <td><?= $row["level9"] ?></td>
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