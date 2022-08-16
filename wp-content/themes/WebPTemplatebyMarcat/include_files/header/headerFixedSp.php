<?php $user = wp_get_current_user(); ?>
<?php $avive = getNowActive(); ?>
<div class="sp_only headerSpFixed">
    <nav class="headerSpGnav">
        <ul class="display_flex_center ulHeaderSpGnav">
            <li class="liHeaderSpGnav">
                <a class="btmHeaderSpGnav jsbtmHeaderSpGnavClip" href="<?php echo home_url('/clip/'); ?>" data-baseUrl="<?php echo home_url('/clip/'); ?>">
                    <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderSpGnav01.svg" alt="" width="30" height="30" />
                </a>
            </li>
            <li class="liHeaderSpGnav">
                <a class="btmHeaderSpGnav" href="<?php echo home_url('/bookmarks/'); ?>" data-baseUrl="<?php echo home_url('/bookmarks/'); ?>">
                    <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderSpGnav02.svg" alt="" width="30" height="30" />
                </a>
            </li>
            <li class="pore liHeaderSpGnav">
                <div class="btmHeaderSpGnav jsbtmHeaderSpGnavSearch">
                    <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderSpGnav03.svg" alt="" width="30" height="30" />
                </div>
            </li>
            <li class="pore liHeaderSpGnav">
                <div class="btmHeaderSpGnav jsbtmHeaderSpGnavTopics">
                    <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderSpGnav04.svg" alt="" width="30" height="30" />
                </div>
                <?php $args = "cat=51&posts_per_page=5"; ?>
                <?php $query1 = new WP_Query($args); ?>
                <?php if ($query1->have_posts()): ?>
                    <nav class="topicsHeaderSp jstopicsHeaderSp">
                        <h3 class="h3UserMenuHeaderSp"><?php echo $user->display_name; ?>へのトピックス情報</h3>
                        <ul class="ulTopicsHeaderSp">
                            <?php while ($query1->have_posts()): $query1->the_post(); ?>
                                <li class="display_flex_stretch liTopicsHeaderSp">
                                    <time class="timeTopicsHeaderSp"><?php echo get_the_date('Y.m.d', $post->ID); ?></time>
                                    <h4 class="h4TopicsHeaderSp"><?php echo get_the_title($post->ID); ?></h4>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    </nav>  
<?php endif; ?>
            </li>
            <li class="pore liHeaderSpGnav">
                <div class="btmHeaderSpGnav jsbtmHeaderSpGnavUsers">                            
                    <?php $img = get_post_custom_thumbsdata(SCF::get_user_meta($user->ID, 'iconUser')); ?>
                    <?php if (empty($img)): ?>
                        <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/nothings.svg" alt="<?php echo $user->display_name; ?>画像" width="30" height="30" />
                    <?php else: ?>
                        <img loading="lazy" loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo $user->display_name; ?>画像" width="30" height="30" />
                    <?php endif; ?>
                </div>
                <nav class="userMenuHeaderSp jsuserMenuHeaderSp">
                    <h3 class="h3UserMenuHeaderSp"><?php echo $user->display_name; ?></h3>
                    <ul class="userItemHeaderSp">
                        <li class="liUserItemHeaderSp">
                            <a class="btmUserItemHeaderSp itemUserItemHeaderSp01" href="<?php echo home_url('/wp-admin/edit.php'); ?>">記事の管理</a>
                        </li>
                        <li class="liUserItemHeaderSp">
                            <a class="btmUserItemHeaderSp itemUserItemHeaderSp02" href="<?php echo home_url('/wp-admin/post-new.php'); ?>">記事の作成</a>
                        </li>
                        <li class="liUserItemHeaderSp">
                            <a class="btmUserItemHeaderSp itemUserItemHeaderSp03" href="<?php echo home_url('/wp-admin/edit-tags.php?taxonomy=category'); ?>">カテゴリーの管理</a>
                        </li>
                        <li class="liUserItemHeaderSp">
                            <a class="btmUserItemHeaderSp itemUserItemHeaderSp03" href="<?php echo home_url('/wp-admin/profile.php'); ?>">ユーザー情報変更</a>
                        </li>
                        <li class="liUserItemHeaderSp">
                            <a class="btmUserItemHeaderSp itemUserItemHeaderSp03" href="<?php echo home_url('/wp-admin/'); ?>">管理画面</a>
                        </li>
                    </ul>
                    <a class="btmLogoutItemHeaderSp itemLogoutItemHeaderSp" href="<?php echo home_url('/wp-login.php?action=logout'); ?>"><spna class="iconLogout">ログアウト</spna></a>
                </nav>
            </li>
        </ul>
    </nav>
</div>