<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<?php get_partial('hero'); ?>

	<main>

		<article>

			<?php if ( have_rows('frequently_asked_questions') ) : ?>

				<?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>

					<div class="faq-item">
						<h4><?php the_sub_field('question'); ?></h4>
						<?php the_sub_field('answer'); ?>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

		<aside>

			<div class="panel / band">

			    <header class="panel__header">
			        <h5 class="panel__title">Free Taster Ride</h5>
			    </header>

			    <div class="panel__content">

			        <p>Welcome to Somerset Advanced Motorcyclists (SAM). We are a friendly and very active club with membership currently standing at around 100 strong.</p>

			        <a href="/book-a-taster-ride/" class="button button--small button--upper">Book your taster ride</a>

			    </div>

			</div>

			<div class="panel panel--links / band">

			    <div class="panel__content">
			        <p><a href="#">Chairman's Address</a></p>
			        <p><a href="#">Associate Training Plan</a></p>
			        <p><a href="#">Code of Conduct</a></p>
			        <p><a href="#">Advertisement and Sponsors</a></p>
			    </div>

			</div>

		</aside>

	</main>

<?php get_footer(); ?>
