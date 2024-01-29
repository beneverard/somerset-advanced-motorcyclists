<section class="hero">

    <div class="hero__content">

        <h1 class="hero__title"><?php the_title(); ?></h1>
        <?php the_field('hero_content'); ?>

        <?php if (basename(get_the_permalink()) === 'events') : ?>
            <div class="events-legend">
                <span><div class="event__rating" data-event-rating="green"></div> All SAM members</span>
                <span><div class="event__rating" data-event-rating="amber"></div> Test-ready associates and test pass holders</span>
                <span><div class="event__rating" data-event-rating="red"></div> Test pass holders only</span>
            </div>

        <?php endif; ?>

    </div>

    <div class="hero__badge">
        <img src="<?php bloginfo('template_directory'); ?>/public/images/iam-partner-logo.png" />
    </div>

</section>

<section class="hero-mobile">

    <div class="hero__content">

        <?php the_field('hero_content'); ?>

        <?php if (basename(get_the_permalink()) === 'events') : ?>
            <div class="events-legend">
                <span><div class="event__rating" data-event-rating="green"></div> All SAM members</span>
                <span><div class="event__rating" data-event-rating="amber"></div> Test-ready associates and test pass holders</span>
                <span><div class="event__rating" data-event-rating="red"></div> Test pass holders only</span>
            </div>

        <?php endif; ?>

    </div>

</section>
