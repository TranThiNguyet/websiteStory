<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/header.php'; ?>
<!-- Story Cat -->
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <!-- Total Story -->
            <?php
            $story_id = $_GET['story_id'];
            //Lấy thông tin truyện
            $query = "SELECT * FROM story WHERE story_id = {$story_id}";
            $result = $mysqli->query($query);
            $arStory = mysqli_fetch_assoc($result);
            $pictureStory = "/files/story/{$arStory['picture']}";
            //Cập nhật lượt xem
            $couterStory = $arStory['couter'];
            $newCouterStory = $couterStory + 1;
            $updateCouterStory = "UPDATE story SET couter = {$newCouterStory} WHERE story_id = {$story_id}";
            $resultCouterStory = $mysqli->query($updateCouterStory);
            //Lấy danh mục truyện liên quan
            $querySameStory = "SELECT * FROM story WHERE cat_id = {$arStory['cat_id']} AND status = 1";
            $resultSameStory = $mysqli->query($querySameStory);
            ?>
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div class="description mt-2">
                    <h3 class="title"> <?php echo $arStory['name'] ?> </h3>
                    <p class="text-muted"><span>Ngày đăng: <?php echo $arStory['created_at'] ?> </span> | <span>Lượt xem: <?php echo $arStory['couter'] ?></span></p>
                </div>
                <div class="detail my-4">
                    <div class="story-title mb-5">
                        <h5><strong><?php echo $arStory['preview_text'] ?></strong></h5>
                    </div>
                    <div class="story-detail">
                        <?php echo $arStory['detail_text'] ?>
                    </div>
                </div>
            </div>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/sidebar.php'; ?>
        </div>
    </div>
    <!-- Same story -->
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">TRUYỆN LIÊN QUAN</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <?php
            while ($arSameStory = mysqli_fetch_assoc($resultSameStory)) {
                if ($arSameStory['story_id'] != $story_id) {
                    $imagesSameStory = "/files/story/{$arSameStory['picture']}";
                    $slugSameStory = utf8ToLatin($arSameStory['name']);
                    $urlSameStory = "/{$slugSameStory}-{$arSameStory['story_id']}.html";
            ?>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <a href="<?php echo $urlSameStory ?>"><img src="<?php echo $imagesSameStory ?>" alt="" style="width: 100%; height: auto" /></a>
                            </div>
                            <div style="margin-top: 10px">
                                <a href="<?php echo $urlSameStory ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $arSameStory['name'] ?></span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo $arSameStory['created_at'] ?></div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- /.Same story -->
</div>
<!-- /. Story Cat -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/footer.php'; ?>