<div class="wapper display_flex_stretch display_row base1Column topicsWap">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('include_files/single/main/mainTitle'); ?>
    <main class="main1Column topicsSingleMain">
        <?php get_template_part('include_files/single/main/mainSingleTopics'); ?>
    </main>
    <?php endwhile; // end of the loop. ?>
</div>

