<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <!-- Cat Story -->
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">DANH MỤC</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        <?php
        $queryDM = "SELECT * FROM cat ORDER BY cat_order ASC";
        $resultDM = $mysqli->query($queryDM);
        while ($arDM = mysqli_fetch_assoc($resultDM)) {
            $slugDM = utf8ToLatin($arDM['cat_name']);
            $urlDM = "/danh-muc/{$slugDM}-{$arDM['cat_id']}";
        ?>
            <a href="<?php echo $urlDM ?>" class="fh5co_tagg"><?php echo $arDM['cat_name'] ?></a>
        <?php
        }
        ?>
    </div>
    <!-- /.Cat Story -->
    <!-- Story Popular -->
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">ĐỌC NHIỀU</div>
    </div>
    <?php
    $queryStory = "SELECT * FROM story ORDER BY couter DESC LIMIT 10";
    $resultStory = $mysqli->query($queryStory);
    while ($arStory = mysqli_fetch_assoc($resultStory)) {
        $picture = "/files/story/{$arStory['picture']}";
        $slugStory = utf8ToLatin($arStory['name']);
        $urlStory = "/{$slugStory}-{$arStory['story_id']}.html";
    ?>
        <div class="row pb-3">
            <div class="col-5 align-self-center">
                <a href="<?php echo $urlStory ?>" style="display: block"><img src="<?php echo $picture ?>" alt="img" class="fh5co_most_trading" /></a>
            </div>
            <div class="col-7 paddding">
                <div class="most_fh5co_treding_font"><a href="<?php echo $urlStory ?>" style="color: #000"><?php echo $arStory['name'] ?></a></div>
                <div class="most_fh5co_treding_font_123">Lượt xem: <?php echo $arStory['couter'] ?></div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- /.Story Popular -->
</div>