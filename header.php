<!DOCTYPE html>
<html class="no-js">

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

		<!-- <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/favicon.ico" type="image/x-icon" /> -->
		<!-- <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-57x57.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-72x72.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-76x76.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-114x114.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-120x120.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-144x144.png" /> -->
		<!-- <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/assets/img/favicons/apple-touch-icon-152x152.png" /> -->

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

			<header class="site-header">

			    <input type="checkbox" id="menu-state" />

			    <a href="/" class="site-header__logos">

			        <img class="site-header__logo" src="/wp-content/themes/sam/public/images/logo.svg" />

			        <label for="menu-state">
			            <img class="site-header__menu" src="/wp-content/themes/sam/public/images/hamburger.svg" />
			        </label>

			    </a>

			    <ul class="site-header__nav">
			        <li><a href="/">Home</a></li>
			        <li><a href="/what-we-do">What We Do</a></li>
			        <li><a href="/events">Events</a></li>
			        <li><a href="/full-chat">Full Chat</a></li>
			        <li><a href="/faq">FAQ</a></li>
			        <li><a href="/swpsr">SWPSR</a></li>
			        <li><a href="/contact">Contact</a></li>
			    </ul>

			</header>
