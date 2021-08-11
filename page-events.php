<?php // page.php ?>

<?php get_header(); ?>

	<?php the_post(); ?>

	<?php

		global $wpdb;

		$events = $wpdb->get_results("SELECT id, name, level, location, all_day, start, end FROM `{$wpdb->prefix}events` ORDER BY start ASC");

	?>

	<main id="events">

		<div class="event__group / band">

			<h2 class="event__group-title">Upcoming Events</h2>

			<div class="[tw: grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 ]">
				<event v-for="event in latestEvents" :event="event" :key="event.id"></event>
			</div>

		</div>

		<div v-for="group in groupedEvents" class="event__group / band">

			<h3 class="event__group-title">{{ group.month }} {{ group.year }}</h3>

			<div class="[tw: grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 ]">
				<event v-for="event in group.events" :event="event" :key="event.id"></event>
			</div>

		</div>

	</main>

	<script src="<?php bloginfo('template_directory'); ?>/public/scripts/libraries/vue.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/public/scripts/libraries/moment.js"></script>
	<script>var events = <?php echo json_encode($events); ?>;</script>

	<script type="text/x-template" id="event">

		<div class="event">

			<header class="event__header">

				<div class="event__rating" v-bind:data-event-rating="event.level" :title="level_title"></div>

				<h3 class="event__title">{{ event.name }}</h3>

			</header>

			<p class="event__date">{{ date }}</p>
			<p class="event__location" v-if="isURL(event.location)"><a :href="event.location">Online</a></p>
			<p class="event__location" v-else>{{ event.location }}</p>

		</div>

	</script>

	<script>

		Vue.component('event', {
			template: '#event',
			props: {
				event: Object
			},
			computed: {
				date: function() {

					var start = moment.utc(this.event.start),
						end = moment.utc(this.event.end);

					// calculate and output an all day date range
					if ( this.event.all_day === '1' ) {

						var duration = moment.duration(end.diff(start)).asDays() - 1;

						if ( duration === 0 ) {
							return start.format('dddd Do MMMM YYYY');
						} else {

							// for multi-day, all day events, subtract one day from the end
							end = end.subtract(1, 'day');

							return start.format('dddd Do MMMM YYYY') + ' - ' + end.format('dddd Do MMMM YYYY');

						}

					}

					return moment.utc(this.event.start).format('h:mm a, dddd Do MMMM YYYY');

				},
				level_title: function() {

					switch (this.event.level) {

						case 'green':
							return 'Ride open to all SAM members';

						case 'amber':
							return 'Ride open to test-ready associates and test pass holders';

						case 'red':
							return 'Ride open to test pass holders only';

					}

				}
			},
			methods: {
				formatDate: function(moment) {
					return moment.format('YYYY');
				},
				isURL: function(location) {
					return location.substr(0, 4) === 'http';
				}
			}
		});

		var app = new Vue({
			el: '#events',
			data: {
				events: events,
				show_all_events: false
			},
			computed: {

				latestEvents: function() {
					return this.events.slice(0, 6);
				},

				otherEvents: function() {
					return this.events.slice(6);
				},

				groupedEvents: function() {
					return this.groupEvents(this.events.slice(6));
				}

			},
			methods: {

				groupEvents: function(events) {

					var months = {};

					events.forEach(function(event) {

						var key = moment.utc(event.start).format('YYMM');

						if ( typeof months[key] === "undefined" ) {
							months[key] = {
								month: moment.utc(event.start).format('MMMM'),
								year: moment.utc(event.start).format('YYYY'),
								events: []
							};
						}

						months[key].events.push(event);

					});

					return months;

				}

			}
		});

	</script>

<?php get_footer(); ?>
