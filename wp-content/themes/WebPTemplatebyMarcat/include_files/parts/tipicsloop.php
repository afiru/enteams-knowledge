<li class="liTopicsLoop">
    <a class="display_flex_stretch display_row btmTopicsLoop" href="<?php echo get_the_permalink($post->ID); ?>">
        <time class="timeTopicsLoop"><?php echo get_the_date('Y.m.d',$post->ID); ?></time>
        <h3 class="h3TopicsLoop"><?php echo get_the_title($post->ID); ?></h3>
    </a>
</li>