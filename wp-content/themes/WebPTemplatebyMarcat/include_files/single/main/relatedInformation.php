<?php 
    $nowCats = get_the_category();
    foreach($nowCats as $nowCat){
        $catIDs[] = $nowCat->cat_ID;
    }
    $catIDs = implode(',', $catIDs);
    $args="cat=$catIDs&posts_per_page=20";
    $query1 = new WP_Query( $args );
?>
<?php if ( $query1->have_posts() ): ?>
    <div class="display_flex_stretch display_row postKnowledgeLoopFx relatedInformationFx">
        <?php while ( $query1->have_posts() ): $query1->the_post(); ?>
            <?php get_template_part('include_files/parts/loop'); ?>
        <?php endwhile; // end of the loop. ?>
    </div>

<?php wp_reset_postdata(); endif; ?>