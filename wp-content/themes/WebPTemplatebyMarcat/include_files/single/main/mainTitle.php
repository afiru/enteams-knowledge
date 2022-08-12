<section class="secMainSingleTitle">
    <?php $nowCats = get_the_category();  ?>
    <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $nowCats[0]->cat_ID, 'category', 'iconCatPost' )); ?>
    <h1 class="prder02 t_center h1MainSingleTitle"><?php echo get_the_title($post->ID); ?></h1>
    <figure class="order01 picMainSingleTitle">
        <img src="<?php echo $icon[0]; ?>" alt="<?php echo $nowCats[0]->cat_name; ?>アイコン画像" width="60" height="60">
    </figure>
</section>