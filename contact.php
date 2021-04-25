<?php
$namePage = "contact";
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/header.php'; ?>
<div class="container-fluid paddding" style="max-width: 1400px">
    <!-- Image-contact -->
    <div id="image-contact">
        <img src="https://salt.tikicdn.com/cache/w1348/ts/lp/e4/b9/e7/3bedd04acf60d4a84588d0bcbbbb0c69.jpg" class="d-block w-100" alt="...">
    </div>
    <!-- /.Image-contact -->
</div>
<!-- Support -->
<div class="container-fluid  fh5co_fh5co_bg_contcat">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4 py-3">
                <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                    <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                        <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                    </div>
                    <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                        <span class="c_g d-block">Điện thoại</span>
                        <span class="d-block c_g fh5co_contact_us_no_text">(+84) 796 936 012</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 py-3">
                <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                    <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                        <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                    </div>
                    <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                        <span class="c_g d-block">Email</span>
                        <span class="d-block c_g fh5co_contact_us_no_text">nguyettran092@gmail.com</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 py-3">
                <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                    <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                        <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-map-marker"></i></span> </div>
                    </div>
                    <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                        <span class="c_g d-block">Địa chỉ</span>
                        <span class="d-block c_g fh5co_contact_us_no_text"> TP. Đà Nẵng - Việt Nam</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /. Support -->

<!-- Contact -->
<div class="container-fluid mb-4">
    <div class="container">
        <div class="col-12 text-center contact_margin_svnit ">
            <div class="text-center fh5co_heading py-2">LIÊN HỆ</div>
            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $website = $_POST['website'];
                $content = $_POST['content'];
                $query = "INSERT INTO contact (name,email,website,content) VALUES ('{$name}','{$email}','{$website}','{$content}')";
                $result = $mysqli->query($query);
                if ($result) {
            ?>
                    <span class="btn btn-success">Gửi liên hệ thành công</span>
            <?php
                } else {
                    echo "Gửi liên hệ không thành công";
                }
            }
            ?>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="row" method="POST" id="fh5co_contact_form">
                    <div class="col-12 py-3">
                        <input type="text" name="name" class="form-control fh5co_contact_text_box" placeholder="Họ và tên" required>
                    </div>
                    <div class="col-6 py-3">
                        <input type="email" name="email" class="form-control fh5co_contact_text_box" placeholder="Email" required>
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" name="website" class="form-control fh5co_contact_text_box" placeholder="Website">
                    </div>
                    <div class="col-12 py-3">
                        <textarea name="content" class="form-control fh5co_contacts_message" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="col-12 py-3 text-center"> <button type="submit" name="submit" class="btn contact_btn">Gửi liên hệ</button> </div>
                </form>
            </div>
            <div class="col-12 col-md-6 align-self-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d289.1133450028207!2d108.15938313565688!3d16.06225865113321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142195ec1905d0b%3A0xc77c1f75ef8af137!2zxJDhuqFpIEjhu41jIFPGsCBQaOG6oW0gxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1609221061988!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- /. Contact -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/footer.php'; ?>