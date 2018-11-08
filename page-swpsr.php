<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<main class="two-columns">

		<article>

			<?php the_field('introduction'); ?>

			<div class="swpsr-content">
				<?php the_content(); ?>
			</div>

			<div class="swpsr-gallery">

				<?php if ( $gallery = get_field('gallery') ) : ?>

					<?php foreach ( $gallery as $image ) : ?>
						<img src="<?php echo $image['sizes']['medium']; ?>" />
					<?php endforeach; ?>

				<?php endif; ?>

			</div>

		</article>

		<aside>

			<?php if ( have_rows('sidebar_boxes') ) : ?>

				<?php while ( have_rows('sidebar_boxes') ) : the_row(); ?>

					<div class="panel / band">

						<header class="panel__header">
							<h5 class="panel__title"><?php the_sub_field('title'); ?></h5>
						</header>

						<div class="panel__content">

							<?php the_sub_field('content'); ?>

							<?php if ( $link = get_sub_field('button') ) : ?>
								<a href="<?php echo $link['url']; ?>" class="button button--small button--upper"><?php echo $link['title']; ?></a>
							<?php endif; ?>

						</div>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

			<div class="swpsr-gallery">

				<?php if ( $gallery = get_field('gallery') ) : ?>

					<?php foreach ( $gallery as $image ) : ?>
						<img src="<?php echo $image['sizes']['medium']; ?>" />
					<?php endforeach; ?>

				<?php endif; ?>

			</div>

		</aside>

	</main>

<?php get_footer(); ?>
