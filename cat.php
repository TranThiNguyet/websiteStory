<?php
    $namePage = "cat";
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/header.php'; ?>
<!-- Story Cat -->
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <!-- Total Story -->
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <?php
                $cat_id = $_GET['cat_id'];
                $queryDM = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
                $resultDM = $mysqli->query($queryDM);
                $arDM = mysqli_fetch_assoc($resultDM);
                $nameDM = $arDM['cat_name'];
                ?>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4" style="text-transform: uppercase;"><?php echo $nameDM ?></div>
                </div>
                <?php
                //Thiết lập phân trang
                $queryRow = "SELECT * FROM story WHERE cat_id = {$cat_id} AND status = 1";
                $resutlRow = $mysqli->query($queryRow);
                $numRow = mysqli_num_rows($resutlRow);
                $numPerPage = ROW_COUNT;
                $numPage = ceil($numRow / $numPerPage);
                $page = 1;
                if (isset($_GET['page']) && $_GET['page']) {
                    $page = $_GET['page'];
                }
                $start = ($page - 1) * $numPerPage;
                //Hiển thị danh sách
                $queryStory = "SELECT * FROM story WHERE cat_id = {$cat_id} AND status = 1 ORDER BY story_id DESC LIMIT {$start},{$numPerPage}";
                $resultStory = $mysqli->query($queryStory);
                while ($arStory = mysqli_fetch_assoc($resultStory)) {
                    $pictureStory = "/files/story/{$arStory['picture']}";
                    $slugStory = utf8ToLatin($arStory['name']);
                    $urlStory = "/{$slugStory}-{$arStory['story_id']}.html";
                ?>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><a href="<?php echo $urlStory ?>"><img src="<?php echo $pictureStory ?>" style="width: 100%; height: auto" alt="" /></a></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="<?php echo $urlStory ?>" class="fh5co_magna" style="display: block;"><?php echo $arStory['name'] ?></a>
                            <span class="fh5co_mini_time pb-3">Lượt xem: <?php echo $arStory['couter'] ?></span> |
                            <span class="fh5co_mini_time pb-3">Ngày đăng: <?php echo $arStory['created_at'] ?></span>
                            <div class="fh5co_consectetur"><?php echo $arStory['preview_text'] ?></div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                    <div class="col-12 text-center pb-4 pt-4">
                        <?php
                        $pagePrev = $page - 1;
                        $urlPrev = "?page={$pagePrev}";
                        $disabledPrev = "";
                        if ($page <= 1) {
                            $disabledPrev = "disabled";
                        }
                        ?>
                        <a href="<?php echo $urlPrev ?>" class="btn btn-secondary <?php echo $disabledPrev ?>"><i class="fa fa-long-arrow-left"></i></a>
                        <?php
                        for ($i = 1; $i <= $numPage; $i++) {
                            $url = "?page={$i}";
                            $active = "";
                            if ($i == $page) {
                                $active = "active";
                            }
                        ?>
                            <a href="<?php echo $url ?>" onclick="get_story(<?php echo $i ?>)" class="btn btn-secondary <?php echo $active ?>"><?php echo $i ?></a>
                        <?php
                        }
                        ?>
                        <?php
                        $pageNext = $page + 1;
                        $urlNext = "?page={$pageNext}";
                        $disabledNext = "";
                        if ($page >= $numPage) {
                            $disabledNext = "disabled";
                        }
                        ?>
                        <a href="<?php echo $urlNext ?>" class="btn btn-secondary <?php echo $disabledNext ?>"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/sidebar.php'; ?>
        </div>
    </div>
</div>
<!-- /. Story Cat -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/bstory/inc/footer.php'; ?>