<?php
session_start();
ob_start();
if ($_SESSION['infoUser']['role'] == 3) {
    header("Location: /admin/story?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php'; ?>
<?php
$story_id = $_GET['story_id'];
//Lấy avatar user nếu có
$queryStory = "SELECT * FROM story WHERE story_id = {$story_id}";
$resultStory = $mysqli->query($queryStory);
$arStory = mysqli_fetch_assoc($resultStory);
$pictureStory = $arStory['picture'];
//Thực hiện xóa User
$query = "DELETE FROM story WHERE story_id = {$story_id}";
$result = $mysqli->query($query);
if ($result) {
    if ($pictureStory) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/files/story/' . $pictureStory);
    }
    header("Location: index.php?msg=Xóa truyện thành công!");
    die();
} else {
    header("Location: Xóa truyện không thành công!");
    die();
}
?>
