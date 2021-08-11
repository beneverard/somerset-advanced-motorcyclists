<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article class="md:col-span-3 / grid grid-cols-2 md:grid-cols-3 gap-4">

			<?php if ( have_rows('full_chat_editions') ) : ?>

				<?php while ( have_rows('full_chat_editions') ) : the_row(); ?>

					<a class="full-chat-item" href="<?php the_sub_field('download'); ?>">
						<img src="<?php echo get_sub_field('cover_image')['sizes']['medium']; ?>" />
						<h3><?php the_sub_field('name'); ?></h3>
					</a>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

		<aside class="md:col-span-1">
			<?php get_partial('panels', 'taster-ride'); ?>
			<?php get_partial('panels', 'social'); ?>
			<?php get_partial('panels', 'helpful-links'); ?>
		</aside>

	</main>

<?php get_footer(); ?>
