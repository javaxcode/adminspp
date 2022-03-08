<?php
include '../include/header.php';
$member = query("SELECT * FROM usersnetwork ORDER BY id DESC");

$juhal = "Affiliasi";
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

                    <?php
                    $email = $_GET["email"];
                    $datauser = query("SELECT * FROM users WHERE email='$email'")[0];
                    $iduser = $datauser['id'];
                    $username = $datauser['username'];
                    $paketuser = query("SELECT * FROM usersnetwork WHERE email='$email'")[0];

                    if ($paketuser['paket'] == "Basic") {
                        $warna = "info";
                    } else if ($paketuser['paket'] == "Advanced") {
                        $warna = "primary";
                    } else if ($paketuser['paket'] == "Expert") {
                        $warna = "success";
                    }

                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title mt-0 mb-3">Downline Network <?= $username ?> <span class="badge badge-soft-<?= $warna ?>">Paket <?= $paketuser['paket'] ?></span></h4>
                                    <?php if ($paketuser['paket'] != "") : ?>
                                        <div id="basicTree">
                                            <ul>
                                                <?php $datalevel1 = query("SELECT * FROM usersnetwork WHERE level1='$username' AND email !='spp21indonesia@gmail.com' "); ?>
                                                <?php foreach ($datalevel1 as $row1) : ?>
                                                    <?php
                                                    $email1 = $row1['email'];
                                                    $datau1 = query("SELECT * FROM users WHERE email='$email1' ")[0];
                                                    if ($row1['paket'] == "Basic") {
                                                        $warnap = "info";
                                                        $namapaket = "Paket " . $row1['paket'];
                                                    } else if ($row1['paket'] == "Advanced") {
                                                        $warnap = "primary";
                                                        $namapaket = "Paket " . $row1['paket'];
                                                    } else if ($row1['paket'] == "Expert") {
                                                        $warnap = "success";
                                                        $namapaket = "Paket " . $row1['paket'];
                                                    } else if ($row1['paket'] == "") {
                                                        $warnap = "warning";
                                                        $namapaket = "Non Paket";
                                                    }
                                                    if ($row1['rank'] == "Manager") {
                                                        $warnar = "info";
                                                        $namarank = "Rank " . $row1['rank'];
                                                    } else if ($row1['rank'] == "Senior M") {
                                                        $warnar = "primary";
                                                        $namarank = "Rank " . $row1['rank'];
                                                    } else if ($row1['rank'] == "Director") {
                                                        $warnar = "success";
                                                        $namarank = "Rank " . $row1['rank'];
                                                    } else if ($row1['rank'] == "") {
                                                        $warnar = "warning";
                                                        $namarank = "Non Rank";
                                                    }
                                                    ?>
                                                    <li data-jstree='{"opened":true}'>LEVEL 1 : <?= $datau1['username'] . ' - ' . $row1['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                        <ul>
                                                            <?php
                                                            $username2 = $datau1['username'];
                                                            $datalevel2 = query("SELECT * FROM usersnetwork WHERE level1='$username2'");
                                                            ?>
                                                            <?php foreach ($datalevel2 as $row2) : ?>
                                                                <?php
                                                                $email2 = $row2['email'];
                                                                $datau2 = query("SELECT * FROM users WHERE email='$email2' ")[0];
                                                                if ($row2['paket'] == "Basic") {
                                                                    $warnap = "info";
                                                                    $namapaket = "Paket " . $row2['paket'];
                                                                } else if ($row2['paket'] == "Advanced") {
                                                                    $warnap = "primary";
                                                                    $namapaket = "Paket " . $row2['paket'];
                                                                } else if ($row2['paket'] == "Expert") {
                                                                    $warnap = "success";
                                                                    $namapaket = "Paket " . $row2['paket'];
                                                                } else if ($row2['paket'] == "") {
                                                                    $warnap = "warning";
                                                                    $namapaket = "Non Paket";
                                                                }
                                                                if ($row2['rank'] == "Manager") {
                                                                    $warnar = "info";
                                                                    $namarank = "Rank " . $row2['rank'];
                                                                } else if ($row2['rank'] == "Senior M") {
                                                                    $warnar = "primary";
                                                                    $namarank = "Rank " . $row2['rank'];
                                                                } else if ($row2['rank'] == "Director") {
                                                                    $warnar = "success";
                                                                    $namarank = "Rank " . $row2['rank'];
                                                                } else if ($row2['rank'] == "") {
                                                                    $warnar = "warning";
                                                                    $namarank = "Non Rank";
                                                                }
                                                                ?>
                                                                <li data-jstree='{"opened":true}'>LEVEL 2 : <?= $datau2['username'] . ' - ' . $row2['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                    <ul>
                                                                        <?php
                                                                        $username3 = $datau2['username'];
                                                                        $datalevel3 = query("SELECT * FROM usersnetwork WHERE level1='$username3'");
                                                                        ?>
                                                                        <?php foreach ($datalevel3 as $row3) : ?>
                                                                            <?php
                                                                            $email3 = $row3['email'];
                                                                            $datau3 = query("SELECT * FROM users WHERE email='$email3' ")[0];
                                                                            if ($row3['paket'] == "Basic") {
                                                                                $warnap = "info";
                                                                                $namapaket = "Paket " . $row3['paket'];
                                                                            } else if ($row3['paket'] == "Advanced") {
                                                                                $warnap = "primary";
                                                                                $namapaket = "Paket " . $row3['paket'];
                                                                            } else if ($row3['paket'] == "Expert") {
                                                                                $warnap = "success";
                                                                                $namapaket = "Paket " . $row3['paket'];
                                                                            } else if ($row3['paket'] == "") {
                                                                                $warnap = "warning";
                                                                                $namapaket = "Non Paket";
                                                                            }
                                                                            if ($row3['rank'] == "Manager") {
                                                                                $warnar = "info";
                                                                                $namarank = "Rank " . $row3['rank'];
                                                                            } else if ($row3['rank'] == "Senior M") {
                                                                                $warnar = "primary";
                                                                                $namarank = "Rank " . $row3['rank'];
                                                                            } else if ($row3['rank'] == "Director") {
                                                                                $warnar = "success";
                                                                                $namarank = "Rank " . $row3['rank'];
                                                                            } else if ($row3['rank'] == "") {
                                                                                $warnar = "warning";
                                                                                $namarank = "Non Rank";
                                                                            }
                                                                            ?>
                                                                            <li data-jstree='{"opened":true}'>LEVEL 3 : <?= $datau3['username'] . ' - ' . $row3['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                <ul>
                                                                                    <?php
                                                                                    $username4 = $datau3['username'];
                                                                                    $datalevel4 = query("SELECT * FROM usersnetwork WHERE level1='$username4'");
                                                                                    ?>
                                                                                    <?php foreach ($datalevel4 as $row4) : ?>
                                                                                        <?php
                                                                                        $email4 = $row4['email'];
                                                                                        $datau4 = query("SELECT * FROM users WHERE email='$email4' ")[0];
                                                                                        if ($row4['paket'] == "Basic") {
                                                                                            $warnap = "info";
                                                                                            $namapaket = "Paket " . $row4['paket'];
                                                                                        } else if ($row4['paket'] == "Advanced") {
                                                                                            $warnap = "primary";
                                                                                            $namapaket = "Paket " . $row4['paket'];
                                                                                        } else if ($row4['paket'] == "Expert") {
                                                                                            $warnap = "success";
                                                                                            $namapaket = "Paket " . $row4['paket'];
                                                                                        } else if ($row4['paket'] == "") {
                                                                                            $warnap = "warning";
                                                                                            $namapaket = "Non Paket";
                                                                                        }
                                                                                        if ($row4['rank'] == "Manager") {
                                                                                            $warnar = "info";
                                                                                            $namarank = "Rank " . $row4['rank'];
                                                                                        } else if ($row4['rank'] == "Senior M") {
                                                                                            $warnar = "primary";
                                                                                            $namarank = "Rank " . $row4['rank'];
                                                                                        } else if ($row4['rank'] == "Director") {
                                                                                            $warnar = "success";
                                                                                            $namarank = "Rank " . $row4['rank'];
                                                                                        } else if ($row4['rank'] == "") {
                                                                                            $warnar = "warning";
                                                                                            $namarank = "Non Rank";
                                                                                        }
                                                                                        ?>
                                                                                        <li data-jstree='{"opened":true}'>LEVEL 4 : <?= $datau4['username'] . ' - ' . $row4['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namarank ?></span>
                                                                                            <ul>
                                                                                                <?php
                                                                                                $username5 = $datau4['username'];
                                                                                                $datalevel5 = query("SELECT * FROM usersnetwork WHERE level1='$username5'");
                                                                                                ?>
                                                                                                <?php foreach ($datalevel5 as $row5) : ?>
                                                                                                    <?php
                                                                                                    $email5 = $row5['email'];
                                                                                                    $datau5 = query("SELECT * FROM users WHERE email='$email5' ")[0];
                                                                                                    if ($row5['paket'] == "Basic") {
                                                                                                        $warnap = "info";
                                                                                                        $namapaket = "Paket " . $row5['paket'];
                                                                                                    } else if ($row5['paket'] == "Advanced") {
                                                                                                        $warnap = "primary";
                                                                                                        $namapaket = "Paket " . $row5['paket'];
                                                                                                    } else if ($row5['paket'] == "Expert") {
                                                                                                        $warnap = "success";
                                                                                                        $namapaket = "Paket " . $row5['paket'];
                                                                                                    } else if ($row5['paket'] == "") {
                                                                                                        $warnap = "warning";
                                                                                                        $namapaket = "Non Paket";
                                                                                                    }
                                                                                                    if ($row5['rank'] == "Manager") {
                                                                                                        $warnar = "info";
                                                                                                        $namarank = "Rank " . $row5['rank'];
                                                                                                    } else if ($row5['rank'] == "Senior M") {
                                                                                                        $warnar = "primary";
                                                                                                        $namarank = "Rank " . $row5['rank'];
                                                                                                    } else if ($row5['rank'] == "Director") {
                                                                                                        $warnar = "success";
                                                                                                        $namarank = "Rank " . $row5['rank'];
                                                                                                    } else if ($row5['rank'] == "") {
                                                                                                        $warnar = "warning";
                                                                                                        $namarank = "Non Rank";
                                                                                                    }
                                                                                                    ?>
                                                                                                    <li data-jstree='{"opened":true}'>LEVEL 5 : <?= $datau5['username'] . ' - ' . $row5['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                                        <ul>
                                                                                                            <?php
                                                                                                            $username6 = $datau5['username'];
                                                                                                            $datalevel6 = query("SELECT * FROM usersnetwork WHERE level1='$username6'");
                                                                                                            ?>
                                                                                                            <?php foreach ($datalevel6 as $row6) : ?>
                                                                                                                <?php
                                                                                                                $email6 = $row6['email'];
                                                                                                                $datau6 = query("SELECT * FROM users WHERE email='$email6' ")[0];
                                                                                                                if ($row6['paket'] == "Basic") {
                                                                                                                    $warnap = "info";
                                                                                                                    $namapaket = "Paket " . $row6['paket'];
                                                                                                                } else if ($row6['paket'] == "Advanced") {
                                                                                                                    $warnap = "primary";
                                                                                                                    $namapaket = "Paket " . $row6['paket'];
                                                                                                                } else if ($row6['paket'] == "Expert") {
                                                                                                                    $warnap = "success";
                                                                                                                    $namapaket = "Paket " . $row6['paket'];
                                                                                                                } else if ($row6['paket'] == "") {
                                                                                                                    $warnap = "warning";
                                                                                                                    $namapaket = "Non Paket";
                                                                                                                }
                                                                                                                if ($row6['rank'] == "Manager") {
                                                                                                                    $warnar = "info";
                                                                                                                    $namarank = "Rank " . $row6['rank'];
                                                                                                                } else if ($row6['rank'] == "Senior M") {
                                                                                                                    $warnar = "primary";
                                                                                                                    $namarank = "Rank " . $row6['rank'];
                                                                                                                } else if ($row6['rank'] == "Director") {
                                                                                                                    $warnar = "success";
                                                                                                                    $namarank = "Rank " . $row6['rank'];
                                                                                                                } else if ($row6['rank'] == "") {
                                                                                                                    $warnar = "warning";
                                                                                                                    $namarank = "Non Rank";
                                                                                                                }
                                                                                                                ?>
                                                                                                                <li data-jstree='{"opened":true}'>LEVEL 6 : <?= $datau6['username'] . ' - ' . $row6['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                                                    <ul>
                                                                                                                        <?php
                                                                                                                        $username7 = $datau6['username'];
                                                                                                                        $datalevel7 = query("SELECT * FROM usersnetwork WHERE level1='$username7'");
                                                                                                                        ?>
                                                                                                                        <?php foreach ($datalevel7 as $row7) : ?>
                                                                                                                            <?php
                                                                                                                            $email7 = $row7['email'];
                                                                                                                            $datau7 = query("SELECT * FROM users WHERE email='$email7' ")[0];
                                                                                                                            if ($row7['paket'] == "Basic") {
                                                                                                                                $warnap = "info";
                                                                                                                                $namapaket = "Paket " . $row7['paket'];
                                                                                                                            } else if ($row7['paket'] == "Advanced") {
                                                                                                                                $warnap = "primary";
                                                                                                                                $namapaket = "Paket " . $row7['paket'];
                                                                                                                            } else if ($row7['paket'] == "Expert") {
                                                                                                                                $warnap = "success";
                                                                                                                                $namapaket = "Paket " . $row7['paket'];
                                                                                                                            } else if ($row7['paket'] == "") {
                                                                                                                                $warnap = "warning";
                                                                                                                                $namapaket = "Non Paket";
                                                                                                                            }
                                                                                                                            if ($row7['rank'] == "Manager") {
                                                                                                                                $warnar = "info";
                                                                                                                                $namarank = "Rank " . $row7['rank'];
                                                                                                                            } else if ($row7['rank'] == "Senior M") {
                                                                                                                                $warnar = "primary";
                                                                                                                                $namarank = "Rank " . $row7['rank'];
                                                                                                                            } else if ($row7['rank'] == "Director") {
                                                                                                                                $warnar = "success";
                                                                                                                                $namarank = "Rank " . $row7['rank'];
                                                                                                                            } else if ($row7['rank'] == "") {
                                                                                                                                $warnar = "warning";
                                                                                                                                $namarank = "Non Rank";
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                            <li data-jstree='{"opened":true}'>LEVEL 7 : <?= $datau7['username'] . ' - ' . $row7['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                                                                <ul>
                                                                                                                                    <?php
                                                                                                                                    $username8 = $datau7['username'];
                                                                                                                                    $datalevel8 = query("SELECT * FROM usersnetwork WHERE level1='$username8'");
                                                                                                                                    ?>
                                                                                                                                    <?php foreach ($datalevel8 as $row8) : ?>
                                                                                                                                        <?php
                                                                                                                                        $email8 = $row8['email'];
                                                                                                                                        $datau8 = query("SELECT * FROM users WHERE email='$email8' ")[0];
                                                                                                                                        if ($row8['paket'] == "Basic") {
                                                                                                                                            $warnap = "info";
                                                                                                                                            $namapaket = "Paket " . $row8['paket'];
                                                                                                                                        } else if ($row8['paket'] == "Advanced") {
                                                                                                                                            $warnap = "primary";
                                                                                                                                            $namapaket = "Paket " . $row8['paket'];
                                                                                                                                        } else if ($row8['paket'] == "Expert") {
                                                                                                                                            $warnap = "success";
                                                                                                                                            $namapaket = "Paket " . $row8['paket'];
                                                                                                                                        } else if ($row8['paket'] == "") {
                                                                                                                                            $warnap = "warning";
                                                                                                                                            $namapaket = "Non Paket";
                                                                                                                                        }
                                                                                                                                        if ($row8['rank'] == "Manager") {
                                                                                                                                            $warnar = "info";
                                                                                                                                            $namarank = "Rank " . $row8['rank'];
                                                                                                                                        } else if ($row8['rank'] == "Senior M") {
                                                                                                                                            $warnar = "primary";
                                                                                                                                            $namarank = "Rank " . $row8['rank'];
                                                                                                                                        } else if ($row8['rank'] == "Director") {
                                                                                                                                            $warnar = "success";
                                                                                                                                            $namarank = "Rank " . $row8['rank'];
                                                                                                                                        } else if ($row8['rank'] == "") {
                                                                                                                                            $warnar = "warning";
                                                                                                                                            $namarank = "Non Rank";
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                        <li data-jstree='{"opened":true}'>LEVEL 8 : <?= $datau8['username'] . ' - ' . $row8['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                                                                            <ul>
                                                                                                                                                <?php
                                                                                                                                                $username9 = $datau8['username'];
                                                                                                                                                $datalevel9 = query("SELECT * FROM usersnetwork WHERE level1='$username9'");
                                                                                                                                                ?>
                                                                                                                                                <?php foreach ($datalevel9 as $row9) : ?>
                                                                                                                                                    <?php
                                                                                                                                                    $email9 = $row9['email'];
                                                                                                                                                    $datau9 = query("SELECT * FROM users WHERE email='$email9' ")[0];
                                                                                                                                                    if ($row9['paket'] == "Basic") {
                                                                                                                                                        $warnap = "info";
                                                                                                                                                        $namapaket = "Paket " . $row9['paket'];
                                                                                                                                                    } else if ($row9['paket'] == "Advanced") {
                                                                                                                                                        $warnap = "primary";
                                                                                                                                                        $namapaket = "Paket " . $row9['paket'];
                                                                                                                                                    } else if ($row9['paket'] == "Expert") {
                                                                                                                                                        $warnap = "success";
                                                                                                                                                        $namapaket = "Paket " . $row9['paket'];
                                                                                                                                                    } else if ($row9['paket'] == "") {
                                                                                                                                                        $warnap = "warning";
                                                                                                                                                        $namapaket = "Non Paket";
                                                                                                                                                    }
                                                                                                                                                    if ($row9['rank'] == "Manager") {
                                                                                                                                                        $warnar = "info";
                                                                                                                                                        $namarank = "Rank " . $row9['rank'];
                                                                                                                                                    } else if ($row9['rank'] == "Senior M") {
                                                                                                                                                        $warnar = "primary";
                                                                                                                                                        $namarank = "Rank " . $row9['rank'];
                                                                                                                                                    } else if ($row9['rank'] == "Director") {
                                                                                                                                                        $warnar = "success";
                                                                                                                                                        $namarank = "Rank " . $row9['rank'];
                                                                                                                                                    } else if ($row9['rank'] == "") {
                                                                                                                                                        $warnar = "warning";
                                                                                                                                                        $namarank = "Non Rank";
                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                    <li data-jstree='{"opened":true}'>LEVEL 9 : <?= $datau9['username'] . ' - ' . $row9['email'] ?> - <span class="badge badge-soft-<?= $warnap ?>"><?= $namapaket ?></span> - <span class="badge badge-soft-<?= $warnar ?>"><?= $namarank ?></span>
                                                                                                                                                    <?php endforeach; ?>
                                                                                                                                            </ul>
                                                                                                                                        </li>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </ul>
                                                                                                                            </li>
                                                                                                                        <?php endforeach; ?>
                                                                                                                    </ul>
                                                                                                                </li>
                                                                                                            <?php endforeach; ?>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                <?php endforeach; ?>
                                                                                            </ul>
                                                                                        </li>
                                                                                    <?php endforeach; ?>
                                                                                </ul>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h2><span class="badge badge-soft-danger">Paket Member Belum Aktif</span></h2>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Jumlah Downline Network </h4>
                                    <?php
                                    $aff = $username;
                                    $total = 10;
                                    ?>
                                    <?php for ($i = 1; $i < $total; $i++) : ?>
                                        <?php
                                        $level = "level" . $i;
                                        $jumlahd = "SELECT COUNT(id) AS total_id FROM usersnetwork WHERE $level='$username' "; //perintah untuk menjumlahkan
                                        $hasild = mysqli_query($conn, $jumlahd); //melakukan query dengan varibel $jumlahkan
                                        $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                                        $tid = $td['total_id'];
                                        ?>
                                        Level <?= $i ?> : <?= $tid; ?> Member
                                        <br>
                                    <?php endfor; ?>
                                </div>
                            </div>
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