<?php

/**
 * Fetches the latest events from the SAM Google Calendar
 * @return void
 */
function fetchLatestEvents() {

    if ( ! defined('GOOGLE_API_KEY') ) {
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
        `start` date DEFAULT NULL,
        `end` date DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    // remove any previous contracts from the table
    $wpdb->query("TRUNCATE TABLE `{$wpdb->prefix}events`");

    // add each event to the events table
    foreach ($results->getItems() as $event) {

        $wpdb->insert($wpdb->prefix . 'events', [
            'id' => $event->id,
            'name' => $event->summary,
            'level' => '',
            'description' => $event->description,
            'start' => $event->modelData->start->dateTime,
            'end' => $event->modelData->end->dateTime
        ]);

    }

}
