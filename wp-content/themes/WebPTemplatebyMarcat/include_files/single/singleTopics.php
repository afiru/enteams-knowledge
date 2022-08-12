<div class="wapper display_flex_stretch display_row base1Column topicsWap">
    <main class="main1Column topicsSingleMain">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('include_files/single/main/mainSingleTopics'); ?>
        <?php endwhile; // end of the loop. ?>
    </main>
</div>

