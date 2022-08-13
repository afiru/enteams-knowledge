<?php $paged = get_query_var('paged', 1); ?>
<?php $args="cat=$cat&posts_per_page=40&paged=$paged"; ?>
<?php $query1 = new WP_Query( $args ); ?>
<?php if ( $query1->have_posts() ): ?>
    <div class="postTopicsLoopFx">
        <?php while ( $query1->have_posts() ): $query1->the_post(); ?>
            <?php get_template_part('include_files/parts/tipicsloop'); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
    <div class="pageNavi">
        <?php wp_pagenavi(array('query' => $query1)); ?>
    </div>
<?php wp_reset_postdata(); endif; ?>