<?php 
    $user = wp_get_current_user(); 
    if (false !== strpos($user->display_name, 'パートナー')) {
        header('Location: https://knowledge.web-pack.jp/');
        exit;
    }
?>
<?php get_header(); ?>
<div class="wapper display_flex_stretch display_row base2Column knowledgeWap">
    <?php get_template_part('include_files/sidebar/sidebarDiary'); ?>
    <main class="main2Column knowledgeMain">
        <?php get_template_part('include_files/category/knowledgeMain'); ?>
    </main>
</div>
<?php get_footer(); ?>
