<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'wp-local' );

/** データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** データベースのホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{x1O I|d%M7J^@:Ow[y_ojdjYn^--W$rp|NcL+rR|mC!BY++c7-C$4+qvi%F7,.^');
define('SECURE_AUTH_KEY',  '-oc_?^.H*,rq?s/k#pwm.(Ycvw8~=KZ<dt2?,jZrzR~1f<);  4||yxsPa4-jRX[');
define('LOGGED_IN_KEY',    'yCYB?d`HpC?Ni]k;(P&t*y|fOWf-|zaYO?U`jP74#8.{fSN@-* (RU@5(k24u!-<');
define('NONCE_KEY',        ' p6bYwxu1HvWc>//D.+ESY{)2i,5[epf6iqIU^-qb9s|S8-Zj<@2l$KNxio+3qaa');
define('AUTH_SALT',        'Gs+:%zZB.j3,=0(g(vl;)wQuOaGf4&TW&imHW#0Q9zpCVlFSs#DfR` Ca.c:K{Z!');
define('SECURE_AUTH_SALT', 'tP5o6|_*dc/*JAs!^&a<NZ<(Op:p3xx`Mhe5 Is<4&>DJE7lGJU)1D!fY>x<804G');
define('LOGGED_IN_SALT',   'yYwy*J/esY<w$+gh~@{2_lib+Ua4%N+6h/,(3-i6IAl3/-+hf94!XXk u{m+$K%T');
define('NONCE_SALT',       ';eww[qS,. ^)la]F-BQ{,|efn,!##w`,ESz,m+|$33KzKj]}>.[ixfNy%7O8PH[Z');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
