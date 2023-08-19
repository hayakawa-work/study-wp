<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<!-- head -->
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
<!-- //head -->
<body>

<!-- header -->
<?php get_header(); ?>
<!-- //header -->
	
<!-- container -->
	<main id="container">
	<?php the_content(); ?>
	</main>
	<!-- //container -->
	
	<!-- footer -->
	<?php get_footer(); ?>
	<!-- //footer -->

</body>
</html>
