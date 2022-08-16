<?php $user = wp_get_current_user(); ?>
<?php $avive = getNowActive(); ?>
<div class="pc_only headerPcWap">
    <div class="bg_fff headerPc">
        <div class="wapper display_flex_center headerPcFx">
            <a class="logoHeaderPc" href="<?php echo home_url('/'); ?>">konwnotes</a>
            <nav class="headerPcGnav">
                <ul class="display_flex_center ulHeaderPcGnav">
                    <li class="liHeaderPcGnav">
                        <a class="btmHeaderPcGnav jsbtmHeaderPcGnavClip" href="<?php echo home_url('/clip/'); ?>" data-baseUrl="<?php echo home_url('/clip/'); ?>">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav01.svg" alt="" width="30" height="30" />
                        </a>
                    </li>
                    <li class="liHeaderPcGnav">
                        <a class="btmHeaderPcGnav" href="<?php echo home_url('/bookmarks/'); ?>" data-baseUrl="<?php echo home_url('/bookmarks/'); ?>">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav02.svg" alt="" width="30" height="30" />
                        </a>
                    </li>
                    <li class="pore liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavSearch">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav03.svg" alt="" width="30" height="30" />
                        </div>
                    </li>
                    <li class="pore liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavTopics">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav04.svg" alt="" width="30" height="30" />
                        </div>
                        <?php $args="cat=51&posts_per_page=5"; ?>
                        <?php $query1 = new WP_Query( $args ); ?>
                        <?php if ( $query1->have_posts() ): ?>
                            <nav class="topicsHeaderPc jstopicsHeaderPc">
                                <h3 class="h3UserMenuHeaderPc"><?php echo $user->display_name;?>へのトピックス情報</h3>
                                <ul class="ulTopicsHeaderPc">
                                    <?php while ( $query1->have_posts() ): $query1->the_post(); ?>
                                    <li class="display_flex_stretch liTopicsHeaderPc">
                                        <time class="timeTopicsHeaderPc"><?php echo get_the_date('Y.m.d',$post->ID); ?></time>
                                        <h4 class="h4TopicsHeaderPc"><?php echo get_the_title($post->ID); ?></h4>
                                    </li>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </ul>
                            </nav>  
                        <?php endif; ?>
                    </li>
                    <li class="pore liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavUsers">                            
                            <?php $img = get_post_custom_thumbsdata(SCF::get_user_meta( $user->ID, 'iconUser' )); ?>
                            <?php if(empty($img)): ?>
                                <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/nothings.svg" alt="<?php echo $user->display_name;?>画像" width="30" height="30" />
                            <?php else: ?>
                                <img loading="lazy" loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo $user->display_name;?>画像" width="30" height="30" />
                            <?php endif; ?>
                        </div>
                        <nav class="userMenuHeaderPc jsuserMenuHeaderPc">
                            <h3 class="h3UserMenuHeaderPc"><?php echo $user->display_name;?></h3>
                            <ul class="userItemHeaderPc">
                                <li class="liUserItemHeaderPc">
                                    <a class="btmUserItemHeaderPc itemUserItemHeaderPc01" href="<?php echo home_url('/wp-admin/edit.php'); ?>">記事の管理</a>
                                </li>
                                <li class="liUserItemHeaderPc">
                                    <a class="btmUserItemHeaderPc itemUserItemHeaderPc02" href="<?php echo home_url('/wp-admin/post-new.php'); ?>">記事の作成</a>
                                </li>
                                <li class="liUserItemHeaderPc">
                                    <a class="btmUserItemHeaderPc itemUserItemHeaderPc03" href="<?php echo home_url('/wp-admin/edit-tags.php?taxonomy=category'); ?>">カテゴリーの管理</a>
                                </li>
                                <li class="liUserItemHeaderPc">
                                    <a class="btmUserItemHeaderPc itemUserItemHeaderPc03" href="<?php echo home_url('/wp-admin/profile.php'); ?>">ユーザー情報変更</a>
                                </li>
                                <li class="liUserItemHeaderPc">
                                    <a class="btmUserItemHeaderPc itemUserItemHeaderPc03" href="<?php echo home_url('/wp-admin/'); ?>">管理画面</a>
                                </li>
                            </ul>
                            <a class="btmLogoutItemHeaderPc itemLogoutItemHeaderPc" href="<?php echo home_url('/wp-login.php?action=logout'); ?>"><spna class="iconLogout">ログアウト</spna></a>
                        </nav>
                    </li>
                </ul>
            </nav>
        </div>
        
        <div class="wapper headerPcTab">
            <ul class="display_flex_stretch ulheaderPcTab">
                <li class="liHeaderPcTab">
                    <a class="btmHeaderPcTab <?php echo $avive['knowledge']; ?>" href="<?php echo get_category_link(1); ?>">KNOWLEDGE</a>
                </li>
                <li class="liHeaderPcTab">
                    <a class="btmHeaderPcTab <?php echo $avive['seminar']; ?>" href="<?php echo get_category_link(2); ?>">SEMINAR</a>
                </li>
                <li class="liHeaderPcTab">
                    <a class="btmHeaderPcTab <?php echo $avive['topics']; ?>" href="<?php echo get_category_link(51); ?>">TOPIX</a>
                </li>
            </ul>
        </div>
    </div>
</div>