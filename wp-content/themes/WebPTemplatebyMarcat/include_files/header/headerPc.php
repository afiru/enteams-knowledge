
<div class="headerPcWap">
    <div class="bg_fff headerPc">
        <div class="wapper headerPcFx">
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
                    <li class="liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavSearch">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav03.svg" alt="" width="30" height="30" />
                        </div>
                    </li>
                    <li class="liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavTopics">
                            <img loading="lazy" loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav04.svg" alt="" width="30" height="30" />
                        </div>
                    </li>
                    <li class="liHeaderPcGnav">
                        <div class="btmHeaderPcGnav jsbtmHeaderPcGnavUsers">                            
                            <?php $user = wp_get_current_user(); $img = get_post_custom_thumbsdata(SCF::get_user_meta( $user->ID, 'iconUser' )); ?>
                            <img loading="lazy" loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="30" height="30" />
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>