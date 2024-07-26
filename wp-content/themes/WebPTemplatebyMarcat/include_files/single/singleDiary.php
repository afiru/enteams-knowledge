<div class="wapper display_flex_stretch display_row base2Column knowledgeWap">
    <?php get_template_part('include_files/sidebar/sidebarDiary'); ?>
    <main class="main2Column singleKnowledgeMain">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('include_files/single/main/mainTitle'); ?>
        <div class="display_flex_stretch display_row singleKnowledgeMainFx">            
            <?php get_template_part('include_files/single/main/rightBar'); ?>
            <?php get_template_part('include_files/single/main/cntMain'); ?> 
        </div>
        <?php endwhile; // end of the loop. ?>
        <?php get_template_part('include_files/single/main/relatedInformation'); ?>
    </main>
</div>