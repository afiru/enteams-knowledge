<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta content="text/css" http-equiv="Content-Style-Type" />
<meta content="text/javascript" http-equiv="Content-Script-Type" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="86400">
<meta http-equiv="Content-Language" content="ja">
<meta name="Robots" content="noodp">
<meta name="Author" content="Marcatucube">
<meta name="copyright" content="" />
<meta name="viewport" content="viewport-fit=cover,width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<?php //タイトルの設定。【トップページ】カスタマイザーのSEOタイトル　【下層】ページタイトル｜カスタマイザーのSEOタイトル　 ?>
<title><?php echo get_the_site_title(get_php_customzer('seo_title')); ?></title>
<?php wp_head(); ?>
<script>
    var home_url ="<?php echo home_url('/'); ?>";
    var theme_url = "<?php echo get_bloginfo('template_url'); ?>";
    var rest_url = "<?php echo home_url('/wp-json/wp/v2/'); ?>";
</script>
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src="//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script type='text/javascript' src="<?php echo get_bloginfo('template_url'); ?>/js/animsition.min.js"></script>
<script type="text/javascript" src='<?php echo get_bloginfo('template_url'); ?>/js/config.js'> </script>
<script type="text/javascript" src='<?php echo get_bloginfo('template_url'); ?>/js/bxslider_setting.js'> </script>
<link rel="stylesheet" id='def_set_css' type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/css/basestyle.css?ver=<?php echo date('Y-m-d'); ?>" media="all">
</head>
<body id="page_top">
<div id="page_wapper_master">
<?php echo get_php_customzer('body_after_code'); ?>
<header id="scroll_off" class="base_header">
    <div class="pc_only"><?php get_template_part('include_files/header/header_pc'); ?></div>
    <div class="sp_only"><?php get_template_part('include_files/header/header_sp'); ?></div>
</header>
