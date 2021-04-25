<?php
session_start();
ob_start();
if ($_SESSION['infoUser']['role'] != 1) {
    header("Location: /admin/user?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php'; ?>
<?php
$user_id = $_GET['user_id'];
//Lấy avatar user nếu có
$queryUser = "SELECT * FROM users WHERE user_id = {$user_id}";
$resultUser = $mysqli->query($queryUser);
$arUser = mysqli_fetch_assoc($resultUser);
$avatarUser = $arUser['avatar'];
//Thực hiện xóa User
$query = "DELETE FROM users WHERE user_id = {$user_id}";
$result = $mysqli->query($query);
if ($result) {
    if ($avatarUser) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/files/user/' . $avatarUser);
    }
    header("Location: index.php?msg=Xóa User thành công!");
    die();
} else {
    header("Location: Xóa User không thành công!");
    die();
}
?>
