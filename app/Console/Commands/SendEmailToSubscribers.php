<?php

namespace App\Console\Commands;

use App\Models\Website;
use Illuminate\Console\Command;
use App\Services\WebsiteService;
use Illuminate\Support\Facades\Log;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to Subscribers of Website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            Log::debug("message");
            $websites = Website::all();
            foreach ($websites as $website) {
                $website->posts->each(function ($post) use ($website) {
                    (new WebsiteService($website))->sendEmailToSubscribers($post);
                });
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
