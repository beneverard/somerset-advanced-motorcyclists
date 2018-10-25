<?php

/**
 * Template Name: Download Page
 */

?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>

			<?php if ( ! post_password_required($post) ) : ?>

				<?php the_content(); ?>

				<?php if ( get_the_content() ) : ?>
					<hr />
				<?php endif; ?>

				<?php if ( have_rows('files') ) : ?>

					<?php while ( have_rows('files') ) : the_row(); ?>

						<div class="file">
							<h3><?php the_sub_field('label'); ?></h3>
							<p><a href="<?php echo get_sub_field('file')['url']; ?>">Download</a></p>
						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			<?php else : ?>
				<?php echo get_the_password_form(); ?>
			<?php endif; ?>

		</article>

		<aside>
			<?php get_partial('panels', 'taster-ride'); ?>
			<?php get_partial('panels', 'social'); ?>
			<?php get_partial('panels', 'helpful-links'); ?>
		</aside>

	</main>

<?php get_footer(); ?>
