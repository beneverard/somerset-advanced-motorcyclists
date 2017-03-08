<?php

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
        `all_day` tinyint(1) DEFAULT 0,
        `start` datetime DEFAULT NULL,
        `end` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    // remove any previous contracts from the table
    $wpdb->query("TRUNCATE TABLE `{$wpdb->prefix}events`");

    $colours = array('', 'green', 'amber', 'red');

    // add each event to the events table
    foreach ($results->getItems() as $event) {

        // don't proceed to save when the name (summary) is empty
        if ( empty($event->summary) ) {
            continue;
        }

        $wpdb->insert($wpdb->prefix . 'events', [
            'id' => $event->id,
            'name' => $event->summary,
            'level' => $colours[mt_rand(0, count($colours) - 1)],
            'description' => $event->description,
            'all_day' => $event->start->date !== null,
            'start' => ! empty($event->start->dateTime) ? $event->start->dateTime : $event->start->date,
            'end' => ! empty($event->end->dateTime) ? $event->end->dateTime : $event->end->date
        ]);

    }

}

try {
    fetchLatestEvents();
} catch (Exception $e) {
    return;
}
