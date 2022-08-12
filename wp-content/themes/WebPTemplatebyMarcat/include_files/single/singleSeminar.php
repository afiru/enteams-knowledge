<div class="wapper display_flex_stretch display_row base2Column knowledgeWap">
    <?php get_template_part('include_files/sidebar/sidebarKnowledge'); ?>
    <main class="main2Column singleKnowledgeMain">
        <div class="display_flex_stretch display_row singleKnowledgeMainFx">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('include_files/single/main/rightBar'); ?>
                <?php get_template_part('include_files/single/main/cntMain'); ?>                
            <?php endwhile; // end of the loop. ?>
        </div>
        <?php get_template_part('include_files/single/main/relatedInformation'); ?>
    </main>
</div>