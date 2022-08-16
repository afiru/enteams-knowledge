<?php

add_filter('big_image_size_threshold', '__return_false');
//jetpackで読まれているCSSを削除
add_filter('jetpack_implode_frontend_css', '__return_false');

/* インラインスタイル削除 */

function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');
add_theme_support('post-thumbnails'); //サムネイルをサポートさせる。

//勝手に読み込まれるJSを削除


function dequeue_css_header() {
    wp_dequeue_style('wp-pagenavi');
    wp_dequeue_style('bodhi-svgs-attachment');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('dashicons');
    wp_dequeue_style('addtoany');
}

add_action('wp_enqueue_scripts', 'dequeue_css_header');

//CSSファイルをフッターに出力
function enqueue_css_footer() {

    wp_enqueue_style('wp-block-library');

    wp_enqueue_style('addtoany');
}

add_action('wp_footer', 'enqueue_css_footer');

if (is_admin()) {
    
} else {

    function my_delete_local_jquery() {
        wp_deregister_script('jquery');
    }

    add_action('wp_enqueue_scripts', 'my_delete_local_jquery');
}

//レンダリングをブロックするのを止めましょう。
if (!(is_admin() )) {

    function add_defer_to_enqueue_script($url) {
        if (FALSE === strpos($url, '.js'))
            return $url;
        if (strpos($url, 'jquery.min.js'))
            return $url;
        return "$url' defer charset='UTF-8";
    }

    add_filter('clean_url', 'add_defer_to_enqueue_script', 11, 1);
}

remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

//子カテゴリーも親カテゴリーと同様の設定を行う
add_filter('category_template', 'my_category_template');

function my_category_template($template) {
    $category = get_queried_object();
    if ($category->parent != 0 &&
            ( $template == "" || strpos($template, "category.php") !== false )) {
        $templates = array();
        while ($category->parent) {
            $category = get_category($category->parent);
            if (!isset($category->slug))
                break;
            $templates[] = "category-{$category->slug}.php";
            $templates[] = "category-{$category->term_id}.php";
        }
        $templates[] = "category.php";
        $template = locate_template($templates);
    }
    return $template;
}

//子カテゴリーで抽出を行う方法
function post_is_in_descendant_category($cats, $_post = null) {
    foreach ((array) $cats as $cat) {
        $descendants = get_term_children((int) $cat, 'category');
        if ($descendants && in_category($descendants, $_post))
            return true;
    }
    return false;
}

//アクセス数の取得
function get_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return "0 views";
    }

    return $count . '';
}

//アクセス数の保存
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count ++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_filter('wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2);

function my_wp_kses_allowed_html($tags, $context) {
    $tags['img']['srcset'] = true;
    $tags['source']['srcset'] = true;
    $tags['source']['data-srcset'] = true;
    return $tags;
}

function get_post_thumbsdata($postID) {
    $thumbnail_id = get_post_thumbnail_id($postID); //アタッチメントIDの取得
    $image = wp_get_attachment_image_src($thumbnail_id, 'full');
    return $image;
}

function get_post_custom_thumbsdata($thumbnail_id) {
    $image = wp_get_attachment_image_src($thumbnail_id, 'full');
    return $image;
}

function get_scf_img_url($name) {
    $cf_sample = SCF::get($name);
    $cf_sample = wp_get_attachment_image_src($cf_sample, 'full');
    return $cf_sample;
}

function get_scf_img_loop_url($name) {
    $cf_sample = wp_get_attachment_image_src($name, 'full');
    return $cf_sample;
}

function get_scf_img_url_id($name, $post_id) {
    $cf_sample = SCF::get($name);
    $cf_sample = wp_get_attachment_image_src($cf_sample, 'full');
    return $cf_sample;
}

function get_scf_img_loop_url_id($name) {
    $cf_sample = wp_get_attachment_image_src($name, 'full');
    return $cf_sample;
}

function get_thumb_url($size = 'full', $post_id = null) {
    $post_id = ($post_id) ? $post_id : get_the_ID();  //第2引数が指定されていればそれを、指定がなければ現在の投稿IDをセット
    if (!has_post_thumbnail($post_id))
        return false;  //指定した投稿がアイキャッチ画像を持たない場合、falseを返す
    $thumb_id = get_post_thumbnail_id($post_id);      // 指定した投稿のアイキャッチ画像の画像IDを取得  
    $thumb_img = wp_get_attachment_image_src($thumb_id, $size);  // 画像の情報を配列で取得  
    return $thumb_img;           //URLを返す
}

function stringOverFlow($strings, $length) {
    $output = strip_tags($strings);
    $output = stripslashes($output);
    $output = preg_replace('/(\s\s|　)/', '', $output);
    $output = preg_replace("/^\xC2\xA0/", "", $output);
    $output = str_replace("&nbsp;", '', $output);
    $output = mb_strimwidth($output, 0, $length, "...", "UTF-8");
    return $output;
}

// ログイン画面のロゴ変更
function login_logo() {
    echo '<style type="text/css">.login h1 a {background-image: url(' . get_bloginfo('template_directory') . '/img/logo.svg);width:150.31px;height:18.48px;background-size:150.31px 18.48px;}..wp-core-ui .button-primary{    background: #3EA8FF;
    border-color: #3EA8FF;}</style>';
}

add_action('login_head', 'login_logo');

// ログイン画面のロゴURL
function custom_login_logo_url() {
    return get_bloginfo('url');
}

add_filter('login_headerurl', 'custom_login_logo_url');

// ログイン画面のロゴタイトル
function custom_login_logo_url_title() {
    return 'トップページを表示';
}

add_filter('login_headertitle', 'custom_login_logo_url_title');

function my_admin_style() {
    wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/css/myAdminStyle.css');
}

add_action('admin_enqueue_scripts', 'my_admin_style');

//ヘッダーのアクティブがどれに向いているのかをチェック
function getNowActive() {
    $cat['knowledge'] = '';
    $cat['seminar'] = '';
    $cat['topics'] = '';
    $cat['NowCatID'] = 1;

    if (is_home()) {
        $cat['knowledge'] = 'active';
        $cat['NowCatID'] = 1;
    }
    if (is_category()) {
        if (cat_is_ancestor_of(1, $cat) or is_category(1)) {
            $cat['knowledge'] = 'active';
            $cat['NowCatID'] = 1;
        } elseif (cat_is_ancestor_of(2, $cat) or is_category(2)) {
            $cat['seminar'] = 'active';
            $cat['NowCatID'] = 2;
        } elseif (cat_is_ancestor_of(51, $cat) or is_category(51)) {
            $cat['topics'] = 'active';
            $cat['NowCatID'] = 51;
        } else {
            $cat['knowledge'] = 'active';
            $cat['NowCatID'] = 1;
        }
    }
    if (is_single()) {
        if (in_category(1) || post_is_in_descendant_category(1)) {
            $cat['knowledge'] = 'active';
            $cat['NowCatID'] = 1;
        } elseif (in_category(2) || post_is_in_descendant_category(2)) {
            $cat['seminar'] = 'active';
            $cat['NowCatID'] = 2;
        } elseif (in_category(51) || post_is_in_descendant_category(51)) {
            $cat['topics'] = 'active';
            $cat['NowCatID'] = 51;
        } else {
            $cat['knowledge'] = 'active';
            $cat['NowCatID'] = 1;
        }
    }
    return $cat;
}

add_filter('show_admin_bar', '__return_false');

//ログイン後のURLを変更
function login_redirect() {
    wp_safe_redirect(home_url());
    exit();
}
add_action('wp_login', 'login_redirect');

function txtClips($id) {
    $user = wp_get_current_user();
    $clips=SCF::get_user_meta( $user->ID , 'userClipsPostIDs' );
    $clips = array_filter(explode(",", $clips));    
    if(in_array($id , $clips)) {
        return 'クリップ済み';
    }
    else {
        return 'クリップする';
    }
}
//お気に入り数
function nowBookmarksIDs() {
    $user = wp_get_current_user();
    $userBookingPostIDs = SCF::get_user_meta( $user->ID , 'userBookingPostIDs' );
    $userBookingPostIDs = array_filter(explode(",", $userBookingPostIDs));
    return $userBookingPostIDs;
}
//クリップの記事を取得
function nowClipsIDs() {
    $user = wp_get_current_user();
    $clips=SCF::get_user_meta( $user->ID , 'userClipsPostIDs' );
    $clips = array_filter(explode(",", $clips));
    
    $getClips = filter_input(INPUT_GET, 'postid', FILTER_SANITIZE_SPECIAL_CHARS);
    $getClips = array_filter(explode(",", $getClips));
    
    return empty($getClips) ? $clips : $getClips;
    
}
function nowClipsIDSet() {
    $user = wp_get_current_user();
    $clips=SCF::get_user_meta( $user->ID , 'userClipsPostIDs' );
    $clips = implode(',', array_filter(explode(",", $clips)));
    return $clips;
}

function outputAllArticle(){
    $count_posts = wp_count_posts();
    $posts = $count_posts->publish;
    return $posts;
}