<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<?php get_partial('hero'); ?>

	<main>
		<?php the_content(); ?>
	</main>

<?php get_footer(); ?>
