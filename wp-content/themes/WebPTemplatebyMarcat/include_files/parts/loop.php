<div class="display_flex_stretch postKnowledgeLoopLxc">
    <a class="btmPostKnowledgeThumbs" href="<?php echo get_the_permalink($post->ID); ?>">
        <?php $nowCats = get_the_category();  ?>
        <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $nowCats[0]->cat_ID, 'category', 'iconCatPost' )); ?>
        <figure class="bg_fff display_flex_center btmPostKnowledgeThumbsWap">
            <img src="<?php echo $icon[0]; ?>" alt="<?php echo $nowCats[0]->cat_name; ?>アイコン画像" width="60" height="60">
        </figure>
    </a>
    <section class="secPostKnowledgeLoop">
        <a class="linkPostKnowledgeLoop" href="<?php echo get_the_permalink($post->ID); ?>">
            <h2 class="h2PostKnowledgeLoop"><?php echo get_the_title($post->ID); ?></h2>
        </a>
        <ul class="display_flex_stretch display_row catsPostKnowledgeLoop">
            <?php foreach($nowCats as $nowCat): ?>
            <li class="liPostKnowledgeLoop">
                <a class="bg_D9D9D9 cl_323232 display_flex_center t_center btmPostKnowledgeLoop" href="<?php echo get_category_link($nowCat->cat_ID); ?>"><?php echo $nowCat->cat_name; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="display_flex_center timeBookClipsPostKnowledgeLoop">
            <time class="timePostKnowledgeLoop"><?php echo get_the_date('Y.m.d',$post->ID); ?></time>
            <div class="bookingPostKnowledgeLoop">
                <span class="iconCountBookingsLoop jsiconCountBookingsLoop" data-postID="<?php echo $post->ID; ?>"><?php echo (int)SCF::get('countPosts'); ?></span>
            </div>
            <div class="clipsPostKnowledgeLoop">
                <span class="iconClipsLoop jsiconClipsLoop" data-postID="<?php echo $post->ID; ?>">クリップする</span>
            </div>
        </div>
    </section>
</div>