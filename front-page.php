<?php // front-page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<?php get_partial('hero'); ?>

	<main>

		<article>
			<?php the_content(); ?>
		</article>

		<aside>

			<?php get_partial('panels', 'taster-ride'); ?>

			<?php get_partial('panels', 'helpful-links'); ?>

		</aside>

	</main>

<?php get_footer(); ?>
