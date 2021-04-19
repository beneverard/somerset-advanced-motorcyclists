<?php

/**
 * Checks a given event name and returns the colour level, if it exists
 * @param  string $event_name the name of the event, which will be prefixed with the colour level
 * @return string/null returns the colour type for this event
 */
function getEventColour($event_name) {

    $colours = array('green', 'amber', 'red');

    foreach ( $colours as $colour ) {

        // if the colour is at the start of the name, return the colour
        if ( strpos(strtolower($event_name), $colour . ' ') === 0 ) {
            return $colour;
	}

    }

}

/**
 * Fetches the latest events from the SAM Google Calendar
 * @return void
 */
function fetchLatestEvents() {

    if ( ! defined('GOOGLE_API_KEY') ) {
        throw new Exception('Google API not set');
        return;
    }

    if ( ! class_exists('Google_Client') ) {
        throw new Exception('Google API class does not exist');
        return;
    }

    // make the connection
    $client = new Google_Client();
    $client->setApplicationName('SAM Calendar');
    $client->setDeveloperKey(GOOGLE_API_KEY);
    $service = new Google_Service_Calendar($client);

    // set the paremeters
    $calendarId = 'somersetadvancedmotorcyclists@gmail.com';
    $optParams = array(
        'maxResults' => 2500,
        'orderBy' => 'startTime',
        'singleEvents' => TRUE,
        'timeMin' => date('c'),
    );

    // attempt to fetch the calendar events
    try {
        $results = $service->events->listEvents($calendarId, $optParams);
    } catch (Exception $e) {
        return;
    }

    global $wpdb;

    // just in case the table doesn't exist, re-create it
    $wpdb->query("CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}events` (
        `id` varchar(255) NOT NULL,
        `name` varchar(255) NOT NULL,
        `level` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        `location` varchar(255) DEFAULT NULL,
        `all_day` tinyint(1) DEFAULT 0,
        `start` datetime DEFAULT NULL,
        `end` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    // remove any previous contracts from the table
    $wpdb->query("TRUNCATE TABLE `{$wpdb->prefix}events`");

    // add each event to the events table
    foreach ($results->getItems() as $event) {

        // don't proceed to save when the name (summary) is empty
        if ( empty($event->summary) ) {
            continue;
        }

		// set the name based on the summary, replacing any emdash elements for normal dashes
		$name = str_replace('–', '-', $event->summary);

        // fetch the colour level for this event
        $colour = getEventColour($name);

        // if a colour exists, remove it from the event name
        if ( $colour ) {
            $name = substr($name, strlen($colour) + 3);
        }

        $wpdb->insert($wpdb->prefix . 'events', [
            'id' => $event->id,
            'name' => $name,
            'level' => $colour,
            'description' => $event->description,
            'location' => $event->location,
            'all_day' => $event->start->date !== null,
            'start' => ! empty($event->start->dateTime) ? $event->start->dateTime : $event->start->date,
            'end' => ! empty($event->end->dateTime) ? $event->end->dateTime : $event->end->date
        ]);

    }

}

if ( isset($_GET['reset_events']) ) {
	fetchLatestEvents();
}

