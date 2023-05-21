<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<!-- header -->
<head>
	<?php wp_head(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="ja" />

	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta http-equiv="Content-Style-Type" content="text/css" />

	<title>きそがわ日和</title>

	<link rel="canonical" href="https://www.kisogawa-biyori.com/">
	<link rel="alternate" href="https://www.kisogawa-biyori.com/" hreflang="ja">
	<link rel="apple-touch-icon" sizes="16x16" href="/ico/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon.ico">

	<!---　共通cssの読み込み　--->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

	<!---　画面固有cssの読み込み　--->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/top.css" type="text/css" />

	<!---　libraryの読み込み　--->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/lib/slick-1.8.1/slick.css" type="text/css" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/lib/js/jquery-3.6.0.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/lib/slick-1.8.1/slick.min.js"></script>

	<!---　jsの読み込み　--->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/top.js"></script>

	<!---　facebooktagの読み込み　--->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

</head>
<!-- //header -->

<body>

<?php get_header(); ?>

<!-- container -->
<main id="container">

<!--- 新着情報ここから --->
	<div class="news">
		<p class="news_title">NEWS</p>
		<article class="news_contents">
			<!-- works_header -->
			<section class="works_header">
				<h2 class="works_header_title"><?php the_title(); ?>
				<?php 
					if (get_post_meta($post->ID, "information_status", true) == 'information_status1') {
							echo '<span class="note">NEW</span>';
					} elseif (get_post_meta($post->ID, "information_status", true) == 'information_status2') {
							echo '<span class="note">終了しました</span>';
					} 
				?>
				</h2>
				<div class="works_profile">
					<div class="works_profile_photo">
						<?php if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているか。
							the_post_thumbnail();
						} 
						?>
					</div>
				</div>
			</section>
			<!-- //works_header -->
			<p class="note_wrap">
			<?php 
				if (get_post_meta($post->ID, "infection_notice_status", true) == 'is-on') 
				echo '<span class="note">※新型コロナウイルス感染症の状況等により予定が変更となる場合があります。あらかじめご了承ください。</span>'
			?>
			</p>
			<!-- works_event -->
			<section class="works_event">
				<h3 class="works_event_title"><?php the_title(); ?></h3>
				<div class="works_event_content"><?php the_content(); ?></div>
			</section>
			<!-- //works_event -->
		</article>
	</div>
<!--- 新着情報ここまで --->

	<p class="about_npo"><a href="/npo/"><span>「特定非営利活動法人きそがわ日和」設立について</span></a></p>

</main>
<!-- //container -->

<!-- footer -->
<?php get_footer(); ?>
<!-- //footer -->

</body>
</html>
