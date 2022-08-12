<section class="secMainTopicsSingle">
    <time class="timeMainTopicsSingle"><?php echo get_the_date('Y.m.d',$post->ID); ?></time>
    <?php the_content(); ?>
</section>
<div class="btmToArchiveWap">
    <a class="btmToArchive" href="<?php echo get_category_link(51); ?>">一覧へ戻る</a>
</div>