<?php
/**
 * @package wp-local
 * @subpackage kisogawa-biyori
 */

/*************************************************
add 20230219
アイキャッチ画像を有効にする
*************************************************/   
add_theme_support('post-thumbnails');
/*************************************************
add 20230219
画像自動リサイズ機能を抑止
*************************************************/   
add_filter('wp_big_image_size_threshold', '__return_false');
?>
