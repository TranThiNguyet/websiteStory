<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/dbConnectUtil.php';
$story_id = $_GET['story_id'];
$query = "SELECT * FROM story INNER JOIN cat ON story.cat_id = cat.cat_id WHERE story_id = {$story_id}";
$result = $mysqli->query($query);
$arStory = mysqli_fetch_assoc($result);
?>
<div class="modal fade bd-example-modal-lg" id="info-story" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông tin bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="about">
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="img-user">
                <?php
                $picture = "/templates/admin/dist/img/avatar.png";
                if ($arStory['picture']) {
                  $picture = "/files/story/{$arStory['picture']}";
                  $status = "<span class='text-warning'>Chờ kiểm duyệt</span>";
                  if ($arStory['status'] == 1) {
                    $status = "<span class='text-success'>Đã xuất bản</span>";
                  }
                }
                ?>
                <img src="<?php echo $picture ?>" class="img-thumbnail" alt="">
              </div>
            </div>
            <div class="col-12 col-sm-8 mt-sm-0 mt-3">
              <div class="info-user">
                <div><b>Tên truyện: </b><?php echo $arStory['name'] ?></div>
                <div><b>Danh mục: </b><?php echo $arStory['cat_name'] ?></div>
                <div><b>Mô tả: </b><?php echo $arStory['preview_text'] ?></div>
                <div><b>Ngày đăng: </b><?php echo $arStory['created_at'] ?></div>
                <div><b>Trạng thái: </b><?php echo $status ?></div>
              </div>
            </div>
            <div class="col-12 mt-3">
              <h4>Chi tiết bài viết</h4>
              <div class="detail">
                <?php echo $arStory['detail_text'] ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>