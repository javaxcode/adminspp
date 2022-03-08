<?php
session_start();
$sessionemail = $_SESSION['email'];
//cek cookie
// if (isset($_COOKIE['email'])) {
//     if ($_COOKIE['email'] == 'true') {
//         $_SESSION['email'] = true;
//     }
// }

if (!isset($_SESSION['email'])) {
    header("location:../index"); // jika belum login, maka dikembalikan ke index
    exit;
}


require '../include/fungsi.php';
$user = query("SELECT * FROM admin WHERE email = '$sessionemail'");
$userlevel = query("SELECT * FROM admin WHERE email = '$sessionemail'")[0];
$ul = $userlevel["userlevel"];
$usernameadmin = $userlevel["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin SPP21</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- jstree css -->
    <link href="../assets/libs/jstree/themes/default/style.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="../assets/libs/treeview/style.css" rel="stylesheet" type="text/css" /> -->

    <!-- third party css -->
    <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- Plugins css -->
    <link href="../assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
    <link href="../assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>