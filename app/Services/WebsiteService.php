<?php

namespace App\Services;

use App\Models\Website;

class WebsiteService
{

    public function __construct(public Website $website)
    {
    }

    public function subscribeUser($user)
    {
        $this->website->subscribers()->attach($user);
    }
}
