<div class="panel / band">

    <header class="panel__header">
        <h5 class="panel__title"><?php the_field('taster_ride_panel_heading', 'options'); ?></h5>
    </header>

    <div class="panel__content">

        <p><?php the_field('taster_ride_panel_content', 'options'); ?></p>

        <?php if ($link = get_field('taster_ride_panel_link', 'options')) : ?>
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="button button--small button--upper"><?php echo $link['title']; ?></a>
        <?php endif; ?>

    </div>

</div>
