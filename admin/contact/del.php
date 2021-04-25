<?php
session_start();
ob_start();
if ($_SESSION['infoUser']['role'] == 3) {
    header("Location: /admin/contact?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php'; ?>
<?php
$contact_id = $_GET['contact_id'];
$query = "DELETE FROM contact WHERE contact_id = {$contact_id}";
$result = $mysqli->query($query);
if ($result) {
    header("Location: index.php?msg=Xóa liên hệ thành công");
    die();
} else {
    echo "Xóa liên hệ không thành công";
    die();
}
?>
