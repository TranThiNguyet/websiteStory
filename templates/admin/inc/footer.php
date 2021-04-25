<!-- Main Footer -->
<footer class="main-footer">
    <strong>Đồ án chuyên ngành tại <a href="">Đại Học Sư Phạm Đà Nẵng</a></strong>
    <div class="float-right d-none d-sm-inline-block">
        Coder By <b>Trần Thị Nguyệt</b>
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- JAVASCRIPT -->
<script src="/templates/admin/plugins/jquery/jquery.min.js"></script>
<!-- Jquery validate -->
<script src="/library/jquery/jquery.validate.min.js"></script>
<script src="/library/jquery/additional-methods.min.js"></script>
<script src="/library/jquery/validate-main.js"></script>
<!-- CK editor -->
<script src="/library/ckeditor/ckeditor.js"></script>
<!-- Bootstrap -->
<script src="/templates/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/templates/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/templates/admin/dist/js/adminlte.js"></script>
<!-- Jquery -->
<script>
    // View User
    function info_user(user_id) {
        $.ajax({
            url: 'view.php',
            method: 'GET',
            cache: false,
            data: {
                user_id: user_id,
            },
            dataType: 'html',
            success: function(data) {
                $("#resutl-user").html(data);
                $('#info').modal();
            },
            error: function() {
                alert("Có lỗi xảy ra");
            }
        });
    }
    // View Story
    function info_story(story_id) {
        $.ajax({
            url: 'view.php',
            method: 'GET',
            cache: false,
            data: {
                story_id: story_id,
            },
            dataType: 'html',
            success: function(data) {
                $("#resutl-story").html(data);
                $('#info-story').modal();
            },
            error: function() {
                alert("Có lỗi xảy ra");
            }
        });
    }
</script>
</body>

</html>
<?php
$mysqli->close();
ob_end_flush();
?>