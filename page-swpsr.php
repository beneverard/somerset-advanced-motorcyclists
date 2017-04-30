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

			<div class="panel / band">

				<header class="panel__header">
					<h5 class="panel__title">7th April 2018</h5>
				</header>

				<div class="panel__content">
					<p>The 10th SWPSR has been announced for Saturday 7th April 2018. Registration will open soon.</p>
				</div>

			</div>

			<div class="panel / band">

				<header class="panel__header">
					<h5 class="panel__title">Contact</h5>
				</header>

				<div class="panel__content">
					<p>Jez Martin, Events Coordinator<br />07590 368808<br /><a href="mailto:jezmartin@btinternet.com">jezmartin@btinternet.com</a></p>
				</div>

			</div>

		</aside>

	</main>

<?php get_footer(); ?>
