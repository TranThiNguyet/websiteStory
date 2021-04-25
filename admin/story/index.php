<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>

<!-- Dữ liệu ajax trả về -->
<div id="resutl-story">

</div>
<!-- Dữ liệu ajax trả về -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách truyện</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a href="add.php" class="btn btn-success">Thêm truyện</a>
                    </div>
                    <div class="float-right mr-2">
                        <a href="/admin/story" class="btn btn-danger" title="Tải lại trang"><i class="fa fa-retweet" aria-hidden="true"></i></a>
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
                                    <input class="form-control my-0 py-1 red-border" type="text" name="search" placeholder="Tên truyện" value="<?php if (isset($_GET['search']) && $_GET['search']) echo $_GET['search'] ?>" aria-label="Search">
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
                        $where = "WHERE name LIKE '%{$search}%'";
                    }
                    //Lấy thông tin phân trang
                    $queryRow = "SELECT * FROM story {$where}";
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
                    $query = "SELECT * FROM story INNER JOIN cat ON story.cat_id = cat.cat_id {$where} ORDER BY story_id DESC LIMIT {$start},{$numPerPage}";
                    $result = $mysqli->query($query);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="min-width: 960px">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên truyện</th>
                                        <th>Danh mục truyện</th>
                                        <th class="text-center" style="width: 90px;">Lượt đọc</th>
                                        <th style="width: 150px;">Hình ảnh</th>
                                        <th style="width: 150px;">Trạng thái</th>
                                        <th style="width: 150px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    while ($arItem = mysqli_fetch_assoc($result)) {
                                        $temp++;
                                        //Url
                                        $urlEdit = "edit.php?story_id={$arItem['story_id']}";
                                        $urlDel = "del.php?story_id={$arItem['story_id']}";
                                        //Status
                                        $status = "<span class = 'btn btn-sm btn-secondary btn-block'>Chờ kiểm duyệt</span>";
                                        if ($arItem['status'] == 1) {
                                            $status = "<span class = 'btn btn-sm btn-primary btn-block'>Xuất bản</span>";
                                        }
                                        //image
                                        $image = "/files/story/{$arItem['picture']}";
                                    ?>
                                        <tr>
                                            <td><?php echo $temp ?></td>
                                            <td><?php echo $arItem['name'] ?></td>
                                            <td><?php echo $arItem['cat_name'] ?></td>
                                            <td class="text-center"><?php echo $arItem['couter'] ?></td>
                                            <td><img src="<?php echo $image ?>" class="img-fluid" alt="thumb-story"></td>
                                            <td><?php echo $status ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm text-muted btn-light" href="javascript:void(0)" onclick="info_story(<?php echo $arItem['story_id'] ?>)" title="Xem thông tin"><i class="fa fa-eye"></i></a>
                                                <?php
                                                if ($_SESSION['infoUser']['role'] != 3) {
                                                ?>
                                                    <a class="btn btn-sm text-muted btn-light" href="<?php echo $urlEdit ?>" title="Sửa" class="edit"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-sm text-muted btn-light" href="<?php echo $urlDel ?>" onclick="return confirm('Bạn thật sự muốn xóa truyện này?')" title="Xóa" class="delete"><i class="fa fa-trash"></i></a>
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