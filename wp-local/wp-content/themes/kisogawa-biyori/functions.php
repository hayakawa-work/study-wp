<?php
// script.aculo.us ライブラリをリンクする
function my_scripts_method() {
    wp_enqueue_script( 'scriptaculous' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' ); // wp_enqueue_scripts アクションフックはフロントエンドのみでリンク

// jQuery に依存するテーマのスクリプトをリンクする
function wpdocs_scripts_method() {
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom_script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );

// cssとjsを読み込む
function enqueue_my_scripts(){
  //  wp_enqueue_style('my-stylesheet', get_stylesheet_uri());
//  wp_enqueue_style('common-style', get_template_directory_uri() . '/assets/css/common.css', array(), '20221122' );
  wp_enqueue_style('top-style', get_template_directory_uri() . '/assets/css/top.css', array(), '20221122' );
  wp_enqueue_style('lib-fancybox-style', get_template_directory_uri() . '/assets/lib/fancybox/jquery.fancybox.css', array(), '20221122' );
  wp_enqueue_script('lib-fancybox-script', get_stylesheet_uri() . '/assets/lib/fancybox/jquery.fancybox.js', array(), '20221122' );
  wp_enqueue_script('lib-fancybox-min-script', get_stylesheet_uri() . '/assets/lib/fancybox/jquery.fancybox.min.js', array(), '20221122' );
  wp_enqueue_style('lib-slick-style', get_template_directory_uri() . '/assets/slick-1.8.1/slick.css', array(), '20221122' );
  wp_enqueue_script('lib-slick-script', get_stylesheet_uri() . '/assets/lib/slick-1.8.1/slick.min.js', array(), '20221122' );
  wp_enqueue_script('lib-jquery-script', get_stylesheet_uri() . '/assets/lib/js/jquery-3.6.0.min.js', array(), '20221122' );
  wp_enqueue_script('top-script', get_stylesheet_uri() . '/assets/js/top.js', array(), '20221122' );

}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

@include_once('functions/menu_setup.php');
@include_once('functions/post_setup.php');
@include_once('functions/post.php');

?>

