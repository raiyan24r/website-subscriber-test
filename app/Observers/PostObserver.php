<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\WebsiteService;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {

        $website = $post->website;
        $websiteService = new WebsiteService($website);

        $websiteService->sendEmailToSubscribers($post);
    }
}
