<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "astory";
$mysqli = new mysqli($localhost, $username, $password, $database);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno()) {
    echo "Không thể kết nối database" . mysqli_connect_error();
    die();
}
