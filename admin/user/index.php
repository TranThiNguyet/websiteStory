<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>

<!-- Dữ liệu ajax trả về -->
<div id="resutl-user">

</div>
<!-- Dữ liệu ajax trả về -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách User</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a href="add.php" class="btn btn-success">Thêm User</a>
                    </div>
                    <div class="float-right mr-2">
                        <a href="/admin/user" class="btn btn-danger" title="Tải lại trang"><i class="fa fa-retweet" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card" style="min-height: 400px">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <?php
                            if (isset($_GET['msg']) && $_GET['msg']) {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
                                    <?php echo $_GET['msg'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-12 col-md-4 mt-md-0 mt-1">
                            <form action="">
                                <div class="input-group md-form form-sm form-2 pl-0">
                                    <input class="form-control my-0 py-1 red-border" type="text" name="search" placeholder="Email | Họ Tên" value="<?php if (isset($_GET['search']) && $_GET['search']) echo $_GET['search'] ?>" aria-label="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php
                    $search = "";
                    $where = "";
                    if (isset($_GET['search']) && $_GET['search']) {
                        $search = $_GET['search'];
                        $where = "WHERE email LIKE '%{$search}%' OR fullname LIKE '%{$search}%'";
                    }
                    //Lấy thông tin phân trang
                    $queryRow = "SELECT * FROM users {$where}";
                    $resultRow = $mysqli->query($queryRow);
                    $numRow = mysqli_num_rows($resultRow);
                    $numPerPage = ROW_COUNT;
                    $numPage = ceil($numRow / $numPerPage);
                    $page = 1;
                    if (isset($_GET['page']) && $_GET['page']) {
                        $page = $_GET['page'];
                    }
                    $start = ($page - 1) * $numPerPage;
                    //Hiển thị danh sách
                    $query = "SELECT * FROM users {$where} ORDER BY role ASC LIMIT {$start},{$numPerPage}";
                    $result = $mysqli->query($query);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="min-width: 960px">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Email</th>
                                        <th>Họ và Tên</th>
                                        <th style="width: 150px;">Vai trò</th>
                                        <th style="width: 150px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    while ($arItem = mysqli_fetch_assoc($result)) {
                                        $temp++;
                                        //Vai trò
                                        if ($arItem['role'] == 1) {
                                            $role = "<span class='btn btn-sm btn-success btn-block'>Quản trị viên</span>";
                                        } elseif ($arItem['role'] == 2) {
                                            $role = "<span class='btn btn-sm btn-primary btn-block'>Biên tập viên</span>";
                                        } else {
                                            $role = "<span class='btn btn-sm btn-secondary btn-block'>Cộng tác viên</span>";
                                        }
                                        //Url
                                        $urlEdit = "edit.php?user_id={$arItem['user_id']}";
                                        $urlDel = "del.php?user_id={$arItem['user_id']}";
                                    ?>
                                        <tr>
                                            <td><?php echo $temp ?></td>
                                            <td><?php echo $arItem['email'] ?></td>
                                            <td><?php echo $arItem['fullname'] ?></td>
                                            <td><?php echo $role ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm text-muted btn-light" href="javascript:void(0)" onclick="info_user(<?php echo $arItem['user_id'] ?>)" title="Xem thông tin"><i class="fa fa-eye"></i></a>
                                                <?php
                                                if ($_SESSION['infoUser']['role'] == 1) {
                                                ?>
                                                    <a class="btn btn-sm text-muted btn-light" href="<?php echo $urlEdit ?>" title="Sửa" class="edit"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-sm text-muted btn-light" href="<?php echo $urlDel ?>" onclick="return confirm('Bạn thật sự muốn xóa tài khoản này?')" title="Xóa" class="delete"><i class="fa fa-trash"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Không tìm thấy dữ liệu hiển thị</div>";
                    }
                    ?>
                </div>
                <!-- /.card-body -->
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div class="card-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <span class="text-muted">Trang <?php echo $page ?>/<?php echo $numPage ?></span>
                            </div>
                            <div class="col-sm-6 col-12">
                                <ul class="pagination m-0 float-right">
                                    <?php
                                    $pagePrev = $page - 1;
                                    $urlPrev = "?page={$pagePrev}";
                                    if ($search) {
                                        $urlPrev = "?search={$search}&page={$pagePrev}";
                                    }
                                    $disabledPrev = "";
                                    if ($page <= 1) {
                                        $disabledPrev = "disabled";
                                    }
                                    ?>
                                    <li class="page-item <?php echo $disabledPrev ?>"><a class="page-link" href="<?php echo $urlPrev ?>">«</a></li>
                                    <?php
                                    for ($i = 1; $i <= $numPage; $i++) {
                                        $urlPaging = "?page={$i}";
                                        if ($search) {
                                            $urlPaging = "?search={$search}&page={$i}";
                                        }
                                        $active = "";
                                        if ($i == $page) {
                                            $active = "active";
                                        }
                                    ?>
                                        <li class="page-item <?php echo $active ?>"><a class="page-link" href="<?php echo $urlPaging ?>"><?php echo $i ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $pageNext = $page + 1;
                                    $pageNext = "?page={$pageNext}";
                                    if ($search) {
                                        $pageNext = "?search={$search}&page={$pageNext}";
                                    }
                                    $disabledNext = "";
                                    if ($page >= $numPage) {
                                        $disabledNext = "disabled";
                                    }
                                    ?>
                                    <li class="page-item <?php echo $disabledNext ?>"><a class="page-link" href="<?php echo $pageNext ?>">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- /.main-content -->
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>