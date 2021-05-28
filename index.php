<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class IndexController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['posts'] = Post::all();

        return new TimberResponse('templates/posts.twig', $context);
    }
}
