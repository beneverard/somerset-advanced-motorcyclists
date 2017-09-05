<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>

			<?php if ( have_rows('frequently_asked_questions') ) : ?>

				<?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>

					<div class="faq-item">
						<h3><?php the_sub_field('question'); ?></h3>
						<?php the_sub_field('answer'); ?>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

		<aside>
			<?php get_partial('panels', 'taster-ride'); ?>
			<?php get_partial('panels', 'social'); ?>
			<?php get_partial('panels', 'helpful-links'); ?>
		</aside>

	</main>

<?php get_footer(); ?>
