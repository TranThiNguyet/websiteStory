<?php
session_start();
ob_start();
if ($_SESSION['infoUser']['role'] == 3) {
    header("Location: /admin/cat?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php'; ?>
<?php
//Xóa danh mục
$cat_id = $_GET['cat_id'];
$query = "DELETE FROM cat WHERE cat_id = {$cat_id}";
$result = $mysqli->query($query);
//Xóa truyện trong danh mục
$queryStory = "DELETE FROM story WHERE cat_id = {$cat_id}";
$resultStory = $mysqli->query($queryStory);
//Thông báo & chuyển hướng
if ($result) {
    header("Location: index.php?msg=Xóa danh mục thành công");
    die();
} else {
    echo "Xóa dữ liệu không thành công";
    die();
}
?>
