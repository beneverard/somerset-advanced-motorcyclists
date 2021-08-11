<!DOCTYPE html>
<html class="no-js" lang="en">

	<head>

		<!-- designed and developed by The Idea Bureau, http://theideabureau.co -->

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/dist/styles/styles.css">

		<title><?php wp_title(); ?></title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="author" content="">
		<meta http-equiv="cleartype" content="on">

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/public/images/favicons/android-chrome-192x192.png" sizes="192x192">
		<meta name="msapplication-square70x70logo" content="<?php bloginfo('template_directory'); ?>/public/images/favicons/smalltile.png" />
		<meta name="msapplication-square150x150logo" content="<?php bloginfo('template_directory'); ?>/public/images/favicons/mediumtile.png" />
		<meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_directory'); ?>/public/images/favicons/widetile.png" />
		<meta name="msapplication-square310x310logo" content="<?php bloginfo('template_directory'); ?>/public/images/favicons/largetile.png" />

		<script>

			(function(d) {

				var config = {
					kitId: 'wly2gjg',
					scriptTimeout: 3000,
					async: true
				},
				h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)

			})(document);

		</script>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(basename(get_permalink())); ?>>

		<div class="wrapper">

			<div class="site-header__container">

				<input type="checkbox" id="menu-state" />

				<header class="site-header">

				    <a href="/" class="site-header__logos">

				        <img class="site-header__logo" src="<?php bloginfo('template_directory'); ?>/public/images/logo.svg" />

				        <label for="menu-state">
				            <img class="site-header__menu" src="<?php bloginfo('template_directory'); ?>/public/images/hamburger.svg" />
				        </label>

				    </a>

					<?php $header_menu = get_menu('Header menu'); ?>

					<?php if ( $header_menu ) : ?>

					    <ul class="site-header__nav">

							<?php foreach ( $header_menu as $menu ) : ?>
					        	<li><a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a></li>
							<?php endforeach; ?>

					    </ul>

					<?php endif; ?>

				</header>

				<div class="provider-band">
					<p>IAM RoadSmart Official Provider</p>
			        <img src="<?php bloginfo('template_directory'); ?>/public/images/iam-logo.png" />
			    </div>

				<?php get_partial('hero'); ?>

			</div> <!-- / .header -->
