<?php
session_start();
ob_start();
?>
<?php
// Hủy session
session_destroy();
//Chuyển hướng
header("Location: /admin/auth/login.php");
?>