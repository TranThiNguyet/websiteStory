<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/templates/admin/dist/img/AdminLTELogo.png" alt="Admin Avatar" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                $avatarUser = "/templates/admin/dist/img/avatar.png";
                if ($_SESSION['infoUser']['avatar']) {
                    $avatarUser = "/files/user/{$_SESSION['infoUser']['avatar']}";
                }
                ?>
                <img src="<?php echo $avatarUser ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['infoUser']['fullname'] ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- info user -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Tài khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user/update.php" class="nav-link">
                                <p>Cập nhật thông tin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/auth/logout.php" class="nav-link">
                                <p>Đăng xuất</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /. Info User -->
                <li class="nav-item">
                    <a href="/admin/cat" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý danh mục
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/story" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý truyện
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>
                            Quản lý thành viên
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/contact" class="nav-link">
                        <i class="nav-icon far fa-bell"></i>
                        <p>
                            Liên hệ
                            <!-- <span class="right badge badge-danger">12</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/auth/logout.php" class="nav-link">
                        <i class="nav-icon fa fa-power-off"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->