<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>

			<?php if ( have_rows('files') ) : ?>

				<?php while ( have_rows('files') ) : the_row(); ?>

					<div class="file">
						<h3><?php the_sub_field('label'); ?></h3>
						<p><a href="<?php echo get_sub_field('file')['url']; ?>">Download</a></p>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

		<aside>

			<?php get_partial('panels', 'taster-ride'); ?>

			<?php get_partial('panels', 'helpful-links'); ?>

		</aside>

	</main>

<?php get_footer(); ?>