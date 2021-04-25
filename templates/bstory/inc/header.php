<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Utf8ToLatinUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/constantUtil.php';
session_start();
ob_start();
?>
<!DOCTYPE html>

<html lang="en" class="no-js">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vstory</title>
    <link href="/templates/bstory/css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="/templates/bstory/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/templates/bstory/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="/templates/bstory/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="/templates/bstory/css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="/templates/bstory/css/style_1.css" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="/templates/bstory/js/modernizr-3.5.0.min.js"></script>
</head>
<style>
    body {
        font-family: Source Sans Pro;
        font-size: 16px;
        line-height: 25px;
    }
</style>

<body>
    <!-- Header -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 fh5co_padding_menu py-1">
                    <a href="/" class="d-block"><img src="/templates/bstory/images/logo.png" alt="img" class="fh5co_logo_width" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href=""><img src="/templates/bstory/images/logo.png" style="padding: 0px;" alt="img" class="mobile_logo_width" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?php if ($namePage == "index") echo "active" ?> ">
                            <a class="nav-link" href="/">Trang chủ<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown <?php if ($namePage == "cat") echo "active" ?>">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục truyện<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <?php
                                $query = "SELECT * FROM cat ORDER BY cat_order ASC";
                                $result = $mysqli->query($query);
                                while ($arItem = mysqli_fetch_assoc($result)) {
                                    $slug = utf8ToLatin($arItem['cat_name']);
                                    $url = "/danh-muc/{$slug}-{$arItem['cat_id']}";
                                ?>
                                    <a class="dropdown-item" href="<?php echo $url ?>"><?php echo $arItem['cat_name'] ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item <?php if ($namePage == "contact") echo "active" ?>">
                            <a class="nav-link" href="/lien-he">Liên hệ<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- /. Header -->