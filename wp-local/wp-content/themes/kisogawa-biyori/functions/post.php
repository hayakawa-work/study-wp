<?php
/**
 * @package wp-local
 * @subpackage kisogawa-biyori
 */

/*************************************************
add 20230324
既存投稿編集画面
カスタムフィールドの表示
*************************************************/
function my_custom_fields($post) { //・・・①

	global $post;
	$information_status = get_post_meta($post->ID, 'information_status', true);
	$information_status1_checked = ($information_status == 'information_status1') ? 'checked': '';
	$information_status2_checked = ($information_status == 'information_status2') ? 'checked': '';
	$information_status3_checked = ($information_status == 'information_status3') ? 'checked': '';

	echo '
	<ul>
		<li>
			<input type="radio" name="information_status" value="information_status1" id="information_status1" '.$information_status1_checked.'>
			<label for="information_status1">新着</label>
		</li>
		<li>
			<input type="radio" name="information_status" value="information_status2" id="information_status2" '.$information_status2_checked.'>
			<label for="information_status2">終了</label>
		</li>
		<li>
			<input type="radio" name="information_status" value="information_status3 id="information_status3" '.$information_status3_checked.'>
			<label for="information_status3">開催中</label>
		</li>
	';

	$infection_notice_status = get_post_meta($post->ID, 'infection_notice_status', true);
	$infection_notice_status_checked = ($infection_notice_status == 'is-on') ? 'checked': '';
	echo '
	<p>
		<label for="infection_notice_status">感染症注意文言の有無：</label>
		<input id="infection_notice_status" type="checkbox" name="infection_notice_status" value="is-on" '.$infection_notice_status_checked.'>
	</p>
	';

}

function manage_insert_meta_box() {
	//それぞれのカスタムフィールドを追加
	add_meta_box(
		'meta_tags_field', //編集画面セクションID
		'新着情報', //編集画面セクションのタイトル
		'my_custom_fields', //編集画面セクションにHTML出力する関数 ①の関数名を設定
		null,  //投稿タイプ名
		'normal' //編集画面セクションが表示される部分
	);
}
add_action('add_meta_boxes', 'manage_insert_meta_box');

/*************************************************
add 20230324
既存投稿編集画面
カスタムフィールドの登録
*************************************************/
function save_custom_fields($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }
	if (isset($_POST['information_status'])) {
			update_post_meta($post_id, 'information_status', $_POST['information_status']);
	} else {
			delete_post_meta($post_id, 'information_status');
	}
	if (isset($_POST['information_status'])) {
		update_post_meta($post_id, 'infection_notice_status', $_POST['infection_notice_status']);
	} else {
		delete_post_meta($post_id, 'infection_notice_status');
	}

}
add_action('save_post', 'save_custom_fields');

?>