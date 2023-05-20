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
カスタムフィールドの追加
*************************************************/   
function my_custom_fields($post) { //・・・①

	global $post;
	echo '値段：<input type="number" placeholder="値段を入力" name="price" value="'.get_post_meta($post->ID, 'price', true).'" style="width:150px;">';

}
function manage_insert_meta_box() {
	// 表示するカスタムフィールドをポストタイプごとに分岐
	if (get_post_type() === 'product') {
		//それぞれのカスタムフィールドを追加
		add_meta_box('meta_tags_field', '商品情報', 'my_custom_fields', null, 'normal'); //第三引数に①の関数名を設定
	}
}
add_action('add_meta_boxes', 'manage_insert_meta_box');

?>