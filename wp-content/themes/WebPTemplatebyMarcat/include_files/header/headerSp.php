<?php $user = wp_get_current_user(); ?>
<?php $avive = getNowActive(); ?>
<div class="sp_only headerSpWap">
    <a class="logoHeaderSp" href="<?php echo home_url('/'); ?>">konwnotes</a>
    <div class="wapper headerSpTab">
        <ul class="display_flex_stretch ulheaderSpTab">
            <li class="liHeaderSpTab">
                <a class="t_center btmHeaderSpTab <?php echo $avive['knowledge']; ?>" href="<?php echo get_category_link(1); ?>">KNOWLEDGE</a>
            </li>
            <?php if (false === strpos($user->display_name, 'パートナー')): ?>
            <li class="liHeaderSpTab">
                <a class="t_center btmHeaderSpTab <?php echo $avive['seminar']; ?>" href="<?php echo get_category_link(2); ?>">SEMINAR</a>
            </li>
            <?php endif; ?>
            <?php if (false === strpos($user->display_name, 'パートナー')): ?>
            <li class="liHeaderSpTab">
                <a class="t_center btmHeaderSpTab <?php echo $avive['diary']; ?>" href="<?php echo get_category_link(64); ?>">DIARY</a>
            </li>
            <?php endif; ?>
            <li class="liHeaderSpTab">
                <a class="t_center btmHeaderSpTab <?php echo $avive['topics']; ?>" href="<?php echo get_category_link(51); ?>">TOPIX</a>
            </li>

        </ul>
    </div>
</div>