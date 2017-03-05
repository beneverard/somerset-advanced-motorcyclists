<?php // front-page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main>

		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

	</main>

<?php get_footer(); ?>
