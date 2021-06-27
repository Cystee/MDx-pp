﻿<!DOCTYPE html>
<html <?php language_attributes();?>>
<head><!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//see.cusalt.com/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
<?php if(!empty(mdx_get_option('ga'))){?><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo mdx_get_option('ga');?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo mdx_get_option('ga');?>');
</script><?php }?>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=<?php if(mdx_get_option('mdx_allow_scale')=='false'){echo '1, user-scalable=no';}else{echo '5';}?>">
<?php if(mdx_get_option('mdx_speed_pre')=='true' && !is_404()){?>
<?php if(is_home()){$mdx_js_name2='js';}elseif(is_category()||is_archive()||is_search()){$mdx_js_name2='ac';}elseif(is_single()){$mdx_js_name2='post';}elseif(is_page()){$mdx_js_name2='page';}else{$mdx_js_name2='js';}
global $files_root;
?>
<link rel="preload" href="<?php echo $files_root;?>/js/common.js?ver=<?php echo get_option("mdx_version_commit");?>" as="script">
<link rel="preload" href="<?php echo $files_root;?>/js/<?php echo $mdx_js_name2?>.js?ver=<?php echo get_option("mdx_version_commit");?>" as="script">
<link rel="preload" href="<?php echo $files_root;?>/mdui/icons/material-icons/<?php if(mdx_get_option("mdx_md2")=="false"){ ?>MaterialIcons-Regular.woff2<?php }else{ ?>material_2_icon_font.woff2<?php } ?>" as="font" type="font/woff2" crossorigin>
<?php if(mdx_get_option('mdx_md2')=="true" && mdx_get_option('mdx_md2_font')=="true"){?>
<link rel="preload" href="<?php echo $files_root;?>/fonts/Montserrat-Regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo $files_root;?>/fonts/Montserrat-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
<?php }}?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if(mdx_get_option('mdx_safari')=="true"){?>
<link rel="mask-icon" href="<?php echo mdx_get_option('mdx_svg');?>" color="<?php echo mdx_get_option('mdx_svg_color');?>">
<?php }?>
<?php if(mdx_get_option("mdx_title_med") == "diy"){?>
<title itemprop="name"><?php global $page, $paged;wp_title('-', true, 'right');
bloginfo('name');$site_description = get_bloginfo('description', 'display');
if($site_description && (is_home() || is_front_page())) echo " - $site_description";if($paged >= 2 || $page >= 2) echo ' - '.sprintf(__('第 %s 页'), max($paged, $page));?>
</title>
<?php }?>
<?php if(is_single() || is_page()){
    if(function_exists('get_query_var')){
        $cpage = intval(get_query_var('cpage'));
        $commentPage = intval(get_query_var('comment-page'));
    }
    if(!empty($cpage) || !empty($commentPage)){
        echo '<meta name="robots" content="noindex, nofollow">';}}?>
<?php if(!is_404()){?>
<?php
$mdx_des=mdx_get_option('mdx_seo_des');
$mdx_s_key=mdx_get_option('mdx_seo_key');
$mdx_a_des=mdx_get_option('mdx_auto_des');?>
<meta property="og:description" content="<?php if(is_single()||is_page()){if(post_password_required()){_e('这篇文章受密码保护，输入密码后才能查看。', 'mdx');}else{echo mdx_get_post_excerpt($post, 100);}}else if($mdx_des!=''){echo $mdx_des;}else{bloginfo('description', 'display');}?>">
<meta name="twitter:url" content="<?php echo $mdx_current_url;?>">
<?php }if($mdx_des!=''){if($mdx_a_des=='true'){if(is_single()||is_page()){?>
<meta name="description" content="<?php if(post_password_required()){_e('这篇文章受密码保护，输入密码后才能查看。', 'mdx');}else{mdx_get_post_excerpt($post, 100);}?>">
<?php }}}if($mdx_s_key!=''){?>
<meta name="keywords" content="<?php bloginfo('name');echo ','.$mdx_s_key;?>">
<?php }}
if(mdx_get_option('mdx_chrome_color')=='true'){
    $mdx_theme_color = mdx_get_option('mdx_styles_hex');
    if(mdx_get_option('mdx_styles') === "white"){
        $mdx_theme_color = "#ffffff";
    }
if(is_single()){
    $mdx_theme_color_page = get_post_meta($post->ID, "mdx_styles_hex", true);
if($mdx_theme_color_page!='def' && $mdx_theme_color_page!=''){
    $mdx_theme_color = $mdx_theme_color_page;
}
if(get_post_meta($post->ID, "mdx_styles", true) === "white"){
    $mdx_theme_color = "#ffffff";
}}?>
<meta name="theme-color" content="<?php echo $mdx_theme_color;?>">
<meta name="mdx-main-color" content="<?php echo $mdx_theme_color;?>">
<?php }?>
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<link rel="manifest" href="<?php echo $files_root;?>/manifest.json">
<?php wp_head(); ?><?php echo htmlspecialchars_decode(mdx_get_option('mdx_head_js'));?>
</head>