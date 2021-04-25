<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>
<?php
if ($_SESSION['infoUser']['role'] != 1) {
    header("Location: /admin/user?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm User</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a href="/admin/user" class="btn btn-success">List User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <?php
                if (isset($_POST['submit'])) {
                    //Lấy thông tin user
                    $email = $_POST['email'];
                    #Kiểm tra email đã tồn tại hay chưa
                    $queryEmail = "SELECT * FROM users WHERE email = '{$email}'";
                    $resultEmail = $mysqli->query($queryEmail);
                    $rowEmail = mysqli_num_rows($resultEmail);
                    if ($rowEmail != 0) {
                ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            Tài khoản đã tồn tại trên hệ thống! Vui lòng kiểm tra và thực hiện lại
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        $password = md5($_POST['password']);
                        $fullname = $_POST['fullname'];
                        $birthday = $_POST['birthday'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $avatar = null;
                        if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['name']) {
                            echo "<pre>";
                            print_r($_FILES['avatar']);
                            echo "</pre>";
                            $fileName = $_FILES['avatar']['name'];
                            $arFileName = explode('.', $fileName);
                            $fileType = strtolower(end($arFileName));
                            $newFileName = "avatar-" . time() . '.' . $fileType;
                            $pathUpload = $_SERVER['DOCUMENT_ROOT'] . '/files/user/' . $newFileName;
                            $tmpName = $_FILES['avatar']['tmp_name'];
                            $resultUpload = move_uploaded_file($tmpName, $pathUpload);
                            if ($resultUpload) {
                                $avatar = $newFileName;
                            }
                        }
                        $role = 3;
                        if ($_POST['role']) {
                            $role = $_POST['role'];
                        }
                        //Insert thông tin vào database
                        $query = "INSERT INTO users (email,password,fullname,phone,address,birthday,avatar,role) VALUES ('{$email}','{$password}','{$fullname}','{$phone}','{$address}','{$birthday}','{$avatar}',{$role})";
                        $result = $mysqli->query($query);
                        if ($result) {
                            header("Location: index.php?msg=Thêm User thành công!");
                            die();
                        } else {
                            echo "Thêm User không thành công!";
                            die();
                        }
                    }
                }
                ?>
                <form id="form-user" role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-md-5">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-muted font-weight-normal">(*)</span></label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="text-muted font-weight-normal">(*)</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Xác nhận Password <span class="text-muted font-weight-normal">(*)</span></label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm-password" placeholder="Confirm password">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Họ tên</label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nhập đầy họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" id="birthday">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Số điện thoại liên hệ">
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>
                                <div class="form-group">
                                    <label for="role">Vai trò <span class="text-muted font-weight-normal">(Mặt định là cộng tác viên)</span></label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">--Chọn vai trò--</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Biên tập viên</option>
                                        <option value="3">Cộng tác viên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-5">
                                <div class="form-group">
                                    <label for="avatar">Ảnh đại diện</label>
                                    <div class="form-group m-t-20" style="width: 215px; height: 215px; overflow: hidden;">
                                        <img src="/templates/admin/dist/img/avatar.png" class="img-thumbnail" alt="Avatar" style="max-width: 100%">
                                    </div>
                                    <span class="text-muted">(Chọn hình ảnh có định dạng ipg,png,jpeg,gif)</span>
                                    <input type="file" name="avatar" class="form-control-file" id="avatar" style="margin: 5px 0px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.main-content -->
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>