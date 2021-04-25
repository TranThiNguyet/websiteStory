<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/constantUtil.php';
session_start();
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/checkUserUtil.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/templates/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/templates/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/templates/admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    label.error {
        font-weight: normal !important;
        color: red;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="btn btn-outline-light text-muted" data-toggle="dropdown" href="#">
                        <span>Xin chào </span>
                        <strong><?php echo $_SESSION['infoUser']['fullname'] ?></strong>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="/admin/user/update.php" class="dropdown-item">
                            Tài Khoản
                        </a>
                        <a href="/admin/auth/logout.php" class="dropdown-item">
                            Đăng xuất
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->