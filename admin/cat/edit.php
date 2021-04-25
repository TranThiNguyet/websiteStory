<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>
<?php
if ($_SESSION['infoUser']['role'] == 3) {
    header("Location: /admin/cat?msg=Bạn không được phép thực hiện chức năng này!");
    die();
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a href="/admin/cat" class="btn btn-success">Danh mục</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary" style="min-height: 400px;">
                <?php
                //Lấy thông tin danh mục
                $cat_id = $_GET['cat_id'];
                $queryDM = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
                $resultDM = $mysqli->query($queryDM);
                $arDM = mysqli_fetch_assoc($resultDM);
                //Cập nhật thông tin danh mục
                if (isset($_POST['submit'])) {
                    $cat_name = $_POST['cat_name'];
                    $cat_order = $_POST['cat_order'];
                    $query = "UPDATE cat SET cat_name = '{$cat_name}', cat_order = {$cat_order} WHERE cat_id = {$cat_id}";
                    $result = $mysqli->query($query);
                    if ($result) {
                        header("Location: index.php?msg=Cập nhật danh mục thành công!");
                        die();
                    } else {
                        echo "Cập nhật danh mục không thành công";
                        die();
                    }
                }
                ?>
                <form id="form-cat" role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-md-5">
                                <div class="form-group">
                                    <label for="cat-name">Tên danh mục <span class="text-muted font-weight-normal">(*)</span></label>
                                    <input type="text" name="cat_name" class="form-control" value="<?php echo $arDM['cat_name'] ?>" id="cat-name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="cat-order">Thứ tự <span class="text-muted font-weight-normal">(Nếu không nhập mặt định 1)</span></label>
                                    <input type="number" name="cat_order" min="1" class="form-control" value="<?php echo $arDM['cat_order'] ?>" id="cat-order" placeholder="1">
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-5">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.main-content -->
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>