<?php // page.php ?>

<?php get_header(); ?>

	<?php

		global $wpdb;

		$events = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}events`", OBJECT );

	?>

	<?php foreach ( $events as $event ) : ?>
		<h3><?php echo $event->name; ?></h3>
	<?php endforeach; ?>

<?php get_footer(); ?>
