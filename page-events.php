<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

class PageEventsController extends Controller
{
    public function handle()
    {
		global $wpdb;

        $context = Timber::get_context();
        $page = new Page();

		// main
        $context['post'] = $page;

		$events = $wpdb->get_results("SELECT id, name, level, location, all_day, start, end FROM `{$wpdb->prefix}events` ORDER BY start ASC");

		$events = array_map(function($event) {

			$event->isOnline = \substr($event->location, 0, 4) === 'http';
			$event->allDay = $event->all_day == '0';
			$event->singleDay = date('U', strtotime($event->end)) - date('U', strtotime($event->start)) <= 86400;

			unset($event->all_day);

			if (! $event->allDay) {

				if ($event->singleDay) {
					$event->formattedDate = date('l jS F Y', \strtotime($event->start));
				} else {
					$event->formattedDate = date('l jS F Y', \strtotime($event->start)) . ' - ' . date('l jS F Y', \strtotime($event->end));
				}

			} else {
				$event->formattedDate = date('H:i a, l jS F Y', \strtotime($event->start));
			}

			return $event;

		}, $events);

		$upcomingEventsCount = 6;

		$context['upcoming_events'] = array_slice($events, 0, $upcomingEventsCount);
		$futureEvents = array_slice($events, $upcomingEventsCount);

		$futureGroups = [];

		foreach ($futureEvents as $event) {

			$dateKey = date('Y-m', strtotime($event->start));

			if (! isset($futureGroups[$dateKey])) {

				$futureGroups[$dateKey] = [
					'heading' => date('F Y', strtotime($event->start)),
					'events' => []
				];

			}

			$futureGroups[$dateKey]['events'][] = $event;

		}

		$context['future_groups'] = $futureGroups;

    	return new TimberResponse('templates/page-events.twig', $context);
    }
}
