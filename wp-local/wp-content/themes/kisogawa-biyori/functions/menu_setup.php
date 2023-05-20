<?php
/**
 * @package wp-local
 * @subpackage kisogawa-biyori
 */

/*************************************************
 add 20220727
 「メディア」を「画像・ファイル」に置き換えて「何のメニューなのか」をイメージしやすくする。
サイドバーのメニューの情報はグローバル変数の$menuと$submenuという配列に登録されているようです。
ここではその値を上書きする形で変更します。
admin_menuにフックして配列を上書く処理を記述します。
サイドバーには常に表示されているメニュー（$menu）と、
ホバーして表示されるサブメニュー（$submenu）があるので置き換えたいラベルの場所に応じて上書きする配列を指定します
$menuは二次元配列で、$menu[10][0]は「メディア」にあたります。
これを「画像・ファイル」に上書きして変更しているということです。
次に子階層にあたる$submenuです。
$menuと似ていますが第一階層にphpのファイル名がキーとして入っているようです。
$submenu['upload.php'][5][0] = '画像・ファイル一覧';は「ライブラリ」という文字列を置き換えていることになります。
これでサイドバーの「メディア」というラベルが置き換わりました。
 *************************************************/
function change_menu_label() {
	global $menu, $submenu;
	$menu[10][0] = '画像・ファイル';
	$submenu['upload.php'][5][0] = '画像・ファイル一覧';
	$submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action( 'admin_menu', 'change_menu_label' );
/*************************************************
 add 20220727
 サイドバーの並び順を変更する
サイドメニューの並び順は上記では$menu_order配列で管理されています。
この配列の中身を入れ替えて並べ替えを実現します。
custom_menu_orderとmenu_orderの2つのフックを利用して処理を実行します。
まず最初のcustom_menu_orderというフックでは、第2引数が「__return_true」となっているのでWordPressにデフォルトで用意されている__return_true()関数を実行し、trueを返しています。
これでWordPress側に「サイドバーの並び順を変更します」と通告するようなイメージです。
その後、menu_orderフックでsort_side_menu()関数を実行し変更後の並び順を定義した配列をreturnするとサイドメニューが並べ替えられます。
 *************************************************/
function sort_side_menu( $menu_order ) {
//  var_dump( $menu_order );
  return array(
    "index.php", // ダッシュボード
    "edit.php", // 投稿
    "edit.php?post_type=page", // 固定ページ
    "separator1", // 区切り線1
    "upload.php", // メディア
    "edit-comments.php", // コメント
    "separator2", // 区切り線2
    "themes.php", // 外観
    "plugins.php", // プラグイン
    "users.php", // ユーザー
    "tools.php", // ツール
    "options-general.php", // 設定
    "separator-last" // 区切り線（最後）
  );

}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'sort_side_menu' );

/*************************************************
 add 20220727
 * 「WordPressへようこそ！」のパネル部分に独自コンテンツを表示
 *************************************************/
function my_welcome_panel() {
	$html = '';
	$html .= '<div class="welcome-panel-content">';
	$html .= '<h2>お知らせ</h2>';
	$html .= '<p>パスワードは定期的に変更しましょう。</p>';
	$html .= '</div>';
	
	echo $html;
}
// 既存パネルを削除する
remove_action( 'welcome_panel', 'wp_welcome_panel' );
// オリジナルパネルを追加する
add_action( 'welcome_panel', 'my_welcome_panel' );


/*************************************************
 add 20220727
管理画面のダッシュボードより不要なブロックを消す
管理画面のダッシュボードにはデフォルトで概要やアクティビティといったウィジェットが並んでいますが、使わないものも多いです。
まずは以下のようにremove_meta_box()で不要なウィジェットは非表示にしましょう。
ウェルカムパネルだけはremove_action()関数で非表示にします。
このウェルカムパネルは管理者権限を持ったユーザーにしか表示されません。
 *************************************************/
function remove_dashboard_widget() {
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // サイトヘルスステータス
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // 概要
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // アクティビティ
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // クイックドラフト
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress イベントとニュース
//	remove_action( 'welcome_panel', 'wp_welcome_panel' ); // ウェルカムパネル
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widget' );

/*************************************************
 add 20220727
 新しいウィジェットを追加する
独自のボタンなどを表示する領域として「ウィジェット」を新規追加します。
2つの関数を実行することでウィジェットを追加できます。
wp_dashboard_setupにフックさせることでダッシュボードに新規ウィジェットを追加できます。
内部で実行しているwp_add_dashboard_widget()の引数はコメントのとおりです。
ウィジェットがダッシュボードに表示されるようになります。
 *************************************************/
function add_dashboard_widgets() {
	wp_add_dashboard_widget(
	  'quick_action_dashboard_widget', // ウィジェットのスラッグ名
	  'クイックアクション', // ウィジェットに表示するタイトル
	  'dashboard_widget_function' // 実行する関数
	);
  }
  add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );
  
/*************************************************
 add 20220727
 新しいウィジェットを追加する1
ウィジェット内に表示したいHTMLを先ほどのdashboard_widget_function()の中に書いていきましょう。
ここではマニュアルを開くリンクボタンと、テーマカスタマイズ画面へのリンクボタンを追加します。

「サイトのカスタマイズ」ボタンをif ( current_user_can( 'administrator' ) )で括っていますが、
このようにすることで管理者権限を与えられているユーザーにのみ表示するように限定できます。
*************************************************/
function dashboard_widget_function() {
	?>
	<ul class="quick-action">
	  <li>
		<a href="https://example.com" target="_blank" class="quick-action-button">
		  <span class="dashicons-before dashicons-book"></span>
		  マニュアルを見る
		</a>
	  </li>
	  <?php if ( current_user_can( 'administrator' ) ) : ?>
		<li>
		  <a href="<?php echo admin_url() . 'customize.php'; ?>" class="quick-action-button">
			<span class="dashicons-before dashicons-admin-customizer"></span>
			サイトのカスタマイズ
		  </a>
		</li>
	  <?php endif; ?>
	</ul>
	<?php
  }
/*************************************************
 add 20220722
  新しいウィジェットを追加する2
CSSは「dashboard.css」というファイルを作成してスタイルを記述しましょう。
functions.phpで以下のようadmin_print_styles-index.phpというフックを利用することでダッシュボードでだけ読み込むようにします。

▼ウィジェットに表示しておくと便利な各種設定画面へのリンク
投稿＞新規追加	admin_url() . 'post-new.php'
ユーザー＞プロフィール	admin_url() . 'profile.php'
外観＞カスタマイズ	admin_url() . 'customize.php'
外観＞メニュー	admin_url() . 'customize.php?autofocus[panel]=nav_menus'
投稿＞投稿一覧	admin_url() . 'edit.php'
設定＞一般	admin_url() . 'options-general.php'
設定＞投稿設定	admin_url() . 'options-writing.php'
設定＞表示設定	admin_url() . 'options-reading.php'
 *************************************************/
function enqueue_dashboard_styles() {
	wp_enqueue_style( 'dashboard_styles', get_template_directory_uri() . '/assets/css/dashboard.css' );
}
add_action( 'admin_print_styles-index.php', 'enqueue_dashboard_styles' );

function add_my_editor_styles() {
	wp_enqueue_style(
		'editor-style', // ハンドル名
		get_template_directory_uri() . '/assets/css/editor_style.css' ); // CSSファイルのパス
}
add_action( 'enqueue_block_editor_assets', 'add_my_editor_styles' );

/*************************************************
 add 20220805
 管理画面からメインメニューの操作
  「記事カテゴリー」メニュー追加
 サイドバーへの追加はadd_menu_page()関数を使用します。
 この関数には7個も引数を渡す必要があります。上から順に説明します。
　①ページタイトル：リンク先ページのタイトルタグに表示するテキスト。
　②ラベル：管理画面のサイドメニューに表示するラベル。
　③表示するユーザーの権限：セットした権限レベルを満たすユーザーにだけこの追加メニューを表示します。
　④スラッグ名：この追加メニューにリンク先として設定するページのスラッグ名。「edit-tags.php」と指定した場合は「https://ドメイン名/wp-admin/edit-tags.php」にリンクします。
　⑤遷移後に実行する関数：リンク先ページを表示したときに実行される関数。何も実行しない場合は空にします。
　⑥アイコン：管理画面のサイドメニューに表示するアイコン。「画像URL」「Base64変換後テキスト」「WPで用意されているアイコン名」のいずれかで指定できます。WPのアイコンはこちらで検索できます。
　⑦表示位置：管理画面のサイドメニューでこの追加メニューを表示する位置。大きい数字ほど下の方に表示されます。
 *************************************************/
/*
 function add_custom_menu() {
	add_menu_page(
	  '記事カテゴリー', // ①ページタイトル
	  '記事カテゴリー', // ②ラベル
	  'manage_options', // ③表示するユーザーの権限
	  'edit-tags.php?taxonomy=category', // ④スラッグ名
	  '', // ⑤遷移後に実行する関数
	  'dashicons-category', // ⑥アイコン
	  '13' // ⑦表示位置
	);
  }
  add_action('admin_menu', 'add_custom_menu');
*/  
/*************************************************
 add 20220805
  管理画面からメインメニューを非表示にする
 *************************************************/   
function remove_menus() {
//	remove_menu_page( 'index.php' ); // ダッシュボード
//	remove_menu_page( 'edit.php' ); // 投稿
//	remove_menu_page( 'edit.php?post_type=campaign' ); // カスタム投稿タイプcampaign
//	remove_menu_page( 'upload.php' ); // メディア
//	remove_menu_page( 'edit.php?post_type=page' ); // 固定ページ
//	remove_menu_page( 'edit-comments.php' ); // コメント
//	remove_menu_page( 'themes.php' ); // 外観
	remove_menu_page( 'plugins.php' ); // プラグイン
//	remove_menu_page( 'users.php' ); // ユーザー
	remove_menu_page( 'tools.php' ); // ツール
//	remove_menu_page( 'options-general.php' ); // 設定 
  } 
  add_action( 'admin_menu', 'remove_menus', 999 );

 /*************************************************
 add 20220805
  管理画面からプラグインメニューを非表示にする
 *************************************************/   
function remove_plugins_menus() {
	remove_menu_page( 'wpcf7' ); // Contact Form 7
	remove_menu_page( 'ai1wm_export' ); // All-in-One WP Migration
	remove_menu_page( 'cptui_main_menu' ); // Custom Post Type UI
  }
  add_action( 'admin_menu', 'remove_plugins_menus' );

?>