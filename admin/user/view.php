<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php'; ?>
<?php
$user_id = $_GET['user_id'];
$query = "SELECT * FROM users WHERE user_id = {$user_id}";
$result = $mysqli->query($query);
$arUser = mysqli_fetch_assoc($result);
?>
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin User</h5>
                <button type="button" class="close btn btn-link" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="about">
                    <div class="row">
                        <div class="col-4 col-sm-5">
                            <div class="img-user">
                                <?php
                                $avatar = "/templates/admin/dist/img/avatar.png";
                                if ($arUser['avatar']) {
                                    $avatar = '/files/user/' . $arUser['avatar'];
                                }
                                ?>
                                <img src="<?php echo $avatar ?>" class="img-thumbnail" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-sm-7">
                            <div class="info-user">
                                <div><b>Họ và tên: </b><?php echo $arUser['fullname'] ?></div>
                                <div><b>Email: </b><?php echo $arUser['email'] ?></div>
                                <div><b>Ngày sinh: </b><?php echo $arUser['birthday'] ?></div>
                                <div><b>Số điện thoại: </b><?php echo $arUser['phone'] ?></div>
                                <div><b>Địa chỉ: </b><?php echo $arUser['address'] ?></div>
                            </div>
                            <div class="role-user mt-3">
                                <?php
                                switch ($arUser['role']) {
                                    case 1:
                                        $role = "Quản trị viên";
                                        break;
                                    case 2:
                                        $role = "Biên tập viên";
                                        break;
                                    default:
                                        $role = "Cộng tác viên";
                                }
                                ?>
                                <span class="btn btn-info btn-sm"><?php echo $role ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>