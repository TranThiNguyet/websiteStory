<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm Truyện</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a href="/admin/story" class="btn btn-success">Danh sách truyện</a>
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
                    $name = $_POST['name'];
                    $cat_id = $_POST['cat_id'];
                    $status = 2;
                    if ($_POST['status']) {
                        $status = $_POST['status'];
                    }
                    $picture = "";
                    if (isset($_FILES['picture']['name']) && $_FILES['picture']['name']) {
                        $fileName = $_FILES['picture']['name'];
                        $arFileName = explode('.', $fileName);
                        $fileType = strtolower(end($arFileName));
                        $newFileName = "story-" . time() . '.' . $fileType;
                        $pathUpload = $_SERVER['DOCUMENT_ROOT'] . '/files/story/' . $newFileName;
                        $tmpName = $_FILES['picture']['tmp_name'];
                        $resultUpload = move_uploaded_file($tmpName, $pathUpload);
                        if ($resultUpload) {
                            $picture = $newFileName;
                        }
                    }
                    $preview_text = $_POST['preview_text'];
                    $detail_text = $_POST['detail_text'];
                    $couter = 0;
                    //Insert thông tin vào database
                    $query = "INSERT INTO story (name,preview_text,detail_text,cat_id,picture,couter,status) VALUES ('{$name}','{$preview_text}','{$detail_text}',{$cat_id},'{$picture}',{$couter},{$status})";
                    $result = $mysqli->query($query);
                    if ($result) {
                        header("Location: index.php?msg=Thêm truyện thành công!");
                        die();
                    } else {
                        echo "Thêm truyện không thành công!";
                        die();
                    }
                }
                ?>
                <form id="form-story" role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-md-5">
                                <div class="form-group">
                                    <label for="name">Tên truyện <span class="text-muted font-weight-normal">(*)</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tên truyện">
                                </div>
                                <div class="form-group">
                                    <label for="cat-id">Danh mục <span class="text-muted font-weight-normal">(*)</span></label>
                                    <select name="cat_id" id="cat-id" class="form-control">
                                        <option value="">--Chọn danh mục--</option>
                                        <?php
                                        $queryDM = "SELECT * FROM cat ORDER BY cat_order ASC";
                                        $resultDM = $mysqli->query($queryDM);
                                        while ($arDM = mysqli_fetch_assoc($resultDM)) {
                                        ?>
                                            <option value="<?php echo $arDM['cat_id'] ?>"><?php echo $arDM['cat_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái <span class="text-muted font-weight-normal">(Mặt định chờ kiểm duyệt)</span></label>
                                    <?php
                                    if ($_SESSION['infoUser']['role'] == 3) {
                                    ?>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">--Trạng thái--</option>
                                            <option selected value="2">Chờ kiểm duyệt</option>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">--Trạng thái--</option>
                                            <option value="1">Xuât bản</option>
                                            <option selected value="2">Chờ kiểm duyệt</option>
                                        </select>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-5">
                                <div class="form-group">
                                    <label for="picture">Ảnh mô tả</label>
                                    <div class="form-group m-t-20" style="width: 215px; height: 215px; overflow: hidden;">
                                        <img src="/templates/admin/dist/img/avatar.png" class="img-thumbnail" alt="Picture" style="max-width: 100%">
                                    </div>
                                    <span class="text-muted">(Chọn hình ảnh có định dạng ipg,png,jpeg,gif)</span>
                                    <input type="file" name="picture" class="form-control-file" id="picture" style="margin: 5px 0px">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="preview-text">Mô tả tiêu đề <span class="text-muted font-weight-normal">(*)</span></label>
                                    <textarea name="preview_text" id="preview-text" class="form-control" placeholder="Nhập tiêu đề mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="detail-text">Nội dung truyện <span class="text-muted font-weight-normal"></span></label>
                                    <textarea name="detail_text" id="detail-text" class="ckeditor form-control" placeholder="Nhập tiêu đề mô tả"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Thêm Truyện</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.main-content -->
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>