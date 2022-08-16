<div class="bg_fff cntMain">
    <?php the_content(); ?>    
    <div class="display_flex_stretch btmBookingClips">
        <?php $nowCats = get_the_category();  ?>
        <a class="cl_93A5B1 bmtToArchiveCat" href="<?php echo get_category_link($nowCats[0]->cat_ID); ?>">一覧へ戻る</a>
        <div class="bookingPostKnowledgeLoop btmBookingClipsBookings">
            <span class="iconCountBookingsLoop jsiconCountBookingsLoop jsiconCountBookingsLoop<?php echo $post->ID; ?>" data-postid="<?php echo $post->ID; ?>"><?php echo (int)SCF::get('countPosts'); ?></span>
        </div>
        <div class="clipsPostKnowledgeLoop btmBookingClipsClips">
            <span class="iconClipsLoop jsiconClipsLoop jsiconClipsLoop<?php echo $post->ID; ?>" data-postid="<?php echo $post->ID; ?>"><?php echo txtClips($post->ID); ?></span>
        </div>
    </div>
</div>