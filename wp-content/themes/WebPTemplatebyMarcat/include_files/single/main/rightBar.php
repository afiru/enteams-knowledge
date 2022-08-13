<div class="rightBar">
    <div class="rightBarFx jsrightBarFx">
        <div class="bg_fff dateRightBar">
            <section class="display_flex_center secDateRightBar">
                <h3 class="cl_93A5B1 h3secDateRightBar">公開日</h3>
                <time class="dateSecDateRightBa"><?php echo get_the_date('Y.m.d',$post->ID); ?></time>
            </section>
            <section class="display_flex_center secDateRightBar">
                <h3 class="cl_93A5B1 h3secDateRightBar">お気に入り</h3>
                <span class="countBookmarks jsiconCountBookingsLoop" data-postID="<?php echo $post->ID; ?>"><?php echo (int)SCF::get('countPosts'); ?></span>
            </section>
            <section class="display_flex_center secDateRightBar">
                <a class="btmDateRightBar" href="<?php echo home_url('//wp-admin/post.php?post='); echo $post->ID; ?>&action=edit" target="_blank">この記事を編集する</a>
            </section>
        </div>

        <section class="bg_fff dateRightBar tocRightBar">
            <h2 class="h2RightBar">目次</h2>
            <div id="tocContainerSet" class="tocContainerSet">

            </div>
        </section>
    </div>
</div>