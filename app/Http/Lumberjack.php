<?php

namespace App\Http;

use Rareloop\Lumberjack\Http\Lumberjack as LumberjackCore;
use App\Menu\Menu;

class Lumberjack extends LumberjackCore
{
    public function addToContext($context)
    {
        $context['is_home'] = is_home();
        $context['is_front_page'] = is_front_page();
        $context['is_logged_in'] = is_user_logged_in();

		$context['header'] = [
			'menu' => new \Timber\Menu('main-nav')
		];

		$context['panels'] = [
			'helpful_links' => new \Timber\Menu('Helpful links'),
			'taster_rides' => [
				'title' => get_field('taster_ride_panel_heading', 'options'),
				'content' => get_field('taster_ride_panel_content', 'options'),
				'link' => get_field('taster_ride_panel_link', 'options')
			]
		];

        return $context;
    }
}
