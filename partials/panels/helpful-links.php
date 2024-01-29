<?php

    $helpful_links = get_menu('Helpful links');

?>

<?php if ($helpful_links) : ?>
    <div class="panel panel--links / band">

        <header class="panel__header">
            <h5 class="panel__title">Helpful Links</h5>
        </header>

        <div class="panel__content">
            <ul>
                <?php foreach ($helpful_links as $menu) : ?>
                    <li><a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

<?php endif; ?>
