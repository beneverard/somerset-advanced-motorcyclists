<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

class PageFaqController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

		// main
        $context['post'] = $page;

    	return new TimberResponse('templates/page-faq.twig', $context);
    }
}
