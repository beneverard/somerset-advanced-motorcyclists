<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>
			<?php the_content(); ?>
		</article>

		<aside>
			<?php get_partial('panels', 'taster-ride'); ?>
			<?php get_partial('panels', 'social'); ?>
			<?php get_partial('panels', 'helpful-links'); ?>
		</aside>

	</main>

<?php get_footer(); ?>
