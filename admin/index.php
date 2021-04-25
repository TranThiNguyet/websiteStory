<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/sidebar.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Trang quản trị</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>4</h3>

                            <p>Danh mục</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-th"></i>
                        </div>
                        <a href="/admin/cat" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53</h3>

                            <p>Truyện</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="/admin/story" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>5</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users nav-icon"></i>
                        </div>
                        <a href="/admin/user" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>12</h3>

                            <p>Liên hệ</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-bell"></i>
                        </div>
                        <a href="/admin/contact" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>