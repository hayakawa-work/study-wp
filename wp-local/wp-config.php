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
define( 'DB_USER', 'dbuser' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'dbuser' );

/** データベースのホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'O]Qc#Y0xBTx#eDZBH,BgKjR9Y$CD>a7a*ZNqm`Fo+nC4s{P)=e~W(1~zE%Ch5|C_' );
define( 'SECURE_AUTH_KEY',  '^X?mqzS-L*)Sh6GD7=.p3UP|ap}WGGvwT2nz?`a7_|7X8VZr&t1_)2m^pcaZ]ceP' );
define( 'LOGGED_IN_KEY',    ' J>kx<_eFAB:KH8>MlCF}cu]v[3?*Xj4 Xe(^UL zmX:a5bGPimKk>|XQz.t=~cx' );
define( 'NONCE_KEY',        'W|*vxx08Lud[9*H`#HgzR]R*X*.y71w$:+9puZ~1J:D9e>B&jL7#R_z?rAp`*4AP' );
define( 'AUTH_SALT',        'eu7B mTWjC3)dh{/pH]16Hf{VYrD4jd@YO82/h<&APM~Z7Dei}V(^lfVrV3Yb]Ik' );
define( 'SECURE_AUTH_SALT', '3j)f;r&[/7(jD}?d%^(R3}d^<}Rm05m%_N?fmt6hIOE7XO6fz&QL{iJ(y:%yd)Z+' );
define( 'LOGGED_IN_SALT',   'q<ovom8.leaL<1EYcTDF2 C*!:+<bK|qEYHJ*A0`)W8JV2#yX9eMH{FX2u2mx=L6' );
define( 'NONCE_SALT',       'o;pK!fBoAC#ua6FCg#iyde,H]>snf|x[%jYg;xI]6c~t$a;A:qu4 0x7 15c`Iaj' );

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
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
