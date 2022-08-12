<?php get_header(); ?>
<?php
if ( in_category(1) || post_is_in_descendant_category(1) ){
    get_template_part('include_files/single/singleKnowledge');
}
elseif ( in_category(2) || post_is_in_descendant_category(2) ){
    get_template_part('include_files/single/singleSeminar');
}
elseif ( in_category(51) || post_is_in_descendant_category(51) ){
    get_template_part('include_files/single/singleTopics');
}
else {
   get_template_part('include_files/single/singleKnowledge'); 
}
?>
<?php get_footer(); ?>