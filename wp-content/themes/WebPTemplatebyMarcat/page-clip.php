<?php
    $clipsIDs = nowClipsIDs();
    if(empty($clipsIDs)) {
        $home_url = home_url('/');
        header("Location: $home_url");
        exit();
    }
?>
<?php get_header(); ?>
<?php     
    $args=[
        'posts_per_page'=>'-1',
        'post__in'=>$clipsIDs,
        'order' =>'ASC',
        'orderby'=>'menu_order'
        ];
?>
<?php $query1 = new WP_Query( $args ); ?>
<?php $i=1; if ( $query1->have_posts() ): ?>
<div class="wapper display_flex_stretch display_row base2Column knowledgeWap">
    <?php get_template_part('include_files/sidebar/sidebarKnowledge'); ?>
    <main class="main2Column singleKnowledgeMain">
        <nav class="bg_fff clipsNav">
            <h2 class="h2KnowledgeMain">クリップした記事</h2>
            
            <?php if(!empty($clipsIDs)): ?>
            <ul class="ulClipsNav">
                <?php foreach($clipsIDs as $key=>$val): ?>
                <li class="display_flex_stretch liClipsNav">
                    <span class="maruicon">●&nbsp;</span>
                    <a href="#clipid<?php echo $val; ?>"><?php echo get_the_title($val); ?></a>
                    <span class="iconClipsLoop jsiconClipsLoop jsiconClipsLoop<?php echo $val; ?>" data-postid="<?php echo $val; ?>"><?php echo txtClips($val); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            
            <section class="display_flex_center display_row shareClips">
                <h3 class="h3shareClips">このクリップを共有</h3>
                <div class="inputBox">
                    <input type="text" value="<?php echo get_the_permalink(2); ?>?postid=<?php echo nowClipsIDSet(); ?>">
                </div>
            </section>
            
            
        </nav>
        <?php while ( $query1->have_posts() ): $query1->the_post(); if($i===1){ $count=0; }else{ $count=1; } ?>
        <article id="clipid<?php echo $post->ID; ?>" class="pageClips pageClips<?php echo $count; ?> pageClips<?php echo $post->ID; ?>" data-postid="<?php echo $post->ID; ?>">
                <?php get_template_part('include_files/single/main/mainTitle'); ?>
                <div class="display_flex_stretch display_row singleKnowledgeMainFx">            
                    <?php get_template_part('include_files/single/main/rightBar'); ?>
                    <?php get_template_part('include_files/single/main/cntMain'); ?> 
                </div>
            </article>
        <?php $i++; endwhile; // end of the loop. ?>
    </main>
</div>
<?php endif; ?>
<?php get_footer(); ?>