<?php get_header(); ?>
<?php $searchCatID = filter_input(INPUT_GET, 'searchCat', FILTER_VALIDATE_INT); ?>
<?php 
if($searchCatID===1){
    get_template_part('include_files/search/searchKnowledge');
}
elseif($searchCatID===2){
    get_template_part('include_files/search/searchSeminar');
}
elseif($searchCatID===51) {
    get_template_part('include_files/search/searchTopics');
}
else {
    get_template_part('include_files/search/searchKnowledge');
}
?>
<?php get_footer(); ?>