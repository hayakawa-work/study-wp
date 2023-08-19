<header id="header">
<!-- TOP-IMG ------------------------------------------------------------ -->
<h1 class="logo"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/top_logo.png" alt="kisogawa-biyori"></a></h1>
<!-- TOP-MENU ----------------------------------------------------------- -->
		<?php breadcrumb(); ?>
<!--- トップイメージ --->
		<?php if ( is_front_page() ) { top_images(); } ?>
<!--- //トップイメージ --->
<!--- sns --->
		<ul class="sns">
			<li class="sns--instagram">
				<a href="https://www.instagram.com/kisogawabiyori" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon03.jpg" alt=""></a>
			</li>
			<li class="sns--facebook">
				<a href="https://www.facebook.com/kisogawabiyori/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon02.png" alt=""></a>
				<div class="fb-like" data-href="https://www.facebook.com/kisogawabiyori" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
			</li>
		</ul>
<!--- //sns --->
</header>
