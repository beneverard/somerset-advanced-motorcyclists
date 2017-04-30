<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>

			<?php if ( have_rows('full_chat_editions') ) : ?>

				<?php while ( have_rows('full_chat_editions') ) : the_row(); ?>

					<a class="full-chat-item" href="<?php the_sub_field('download'); ?>">
						<img src="<?php echo get_sub_field('cover_image')['sizes']['medium']; ?>" />
						<h3><?php the_sub_field('name'); ?></h3>
					</a>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

		<aside>

			<?php get_partial('panels', 'taster-ride'); ?>

			<?php get_partial('panels', 'helpful-links'); ?>

		</aside>

	</main>

<?php get_footer(); ?>
