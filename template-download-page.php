<?php

/**
 * Template Name: Download Page
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

class TemplateDownloadPageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $context['post'] = $page;
        $context['content'] = $page->content;

        if (!post_password_required()) {
            return new TimberResponse('templates/template-download-page.twig', $context);
        } else {
            $context['password_form'] = get_the_password_form();
            return new TimberResponse('templates/password.twig', $context);
        }
    }
}
