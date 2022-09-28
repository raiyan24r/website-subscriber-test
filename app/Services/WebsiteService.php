<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Website;
use App\Jobs\EmailSubscriber;

class WebsiteService
{

    public function __construct(public Website $website)
    {
    }

    /**
     * Subscribe a user to the website
     * 
     * @param User $user
     */
    public function subscribeUser(User $user)
    {
        $this->website->subscribers()->attach($user);
    }

    /**
     * Send email to all subscribers of the website
     * @param Post $post
     */
    public function sendEmailToSubscribers(Post $post)
    {
        $this->website->subscribers->each(function ($subscriber) use ($post) {
            EmailSubscriber::dispatch($post->title, $post->description, $subscriber->email)->onQueue('emails');
        });
    }

    
}
