<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

/**
 * Class names can not start with a number so the 404 controller has a special cased name
 */
class Error404Controller extends Controller
{
	public function handle()
	{
        $context = Timber::get_context();

    	return new TimberResponse('templates/errors/404.twig', $context, 404);
	}
}
