<section class="hero">

    <div class="hero__content">
        <h1><?php the_title(); ?></h1>
        <?php the_field('hero_content'); ?>
    </div>

    <div class="hero__badge">
        <img src="<?php bloginfo('template_directory'); ?>/public/images/iam-partner-logo.png" />
    </div>

</section>

<section class="hero-mobile">

    <div class="hero__content">
        <?php the_field('hero_content'); ?>
    </div>

</section>
