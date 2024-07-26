<?php $paged = get_query_var('paged', 1); $args="cat=1&posts_per_page=200&order=ASC&orderby=menu_order&paged=$paged"; ?>
<?php $query1 = new WP_Query( $args ); ?>
<?php if ( $query1->have_posts() ): ?>
    <div class="display_flex_stretch display_row postKnowledgeLoopFx">
        <?php while ( $query1->have_posts() ): $query1->the_post(); ?>
            <?php get_template_part('include_files/parts/loop'); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
    <div class="pageNavi">
        <?php wp_pagenavi(array('query' => $query1)); ?>
    </div>
<?php wp_reset_postdata(); endif; ?>