<?php
if (!isset($_SESSION['user'])) {
    header("Location: /admin/auth/login.php");
}
?>
<?php
#Lấy thông tin user
$emailUser = $_SESSION['user'];
$result = $mysqli->query("SELECT * FROM users WHERE email = '{$emailUser}'");
$arUser = mysqli_fetch_assoc($result);
$_SESSION['infoUser'] = $arUser;
?>