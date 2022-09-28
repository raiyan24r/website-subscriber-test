<?php

namespace App\Jobs;

use App\Mail\NewPostMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class EmailSubscriber implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $subscriber, $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscriber, $post)
    {

        $this->subscriber = $subscriber;
        $this->post = $post;
    }



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->subscriber->email)->send(new NewPostMail($this->post->title, $this->post->description));

        $this->subscriber->emailLogs()->create([
            'post_id' => $this->post->id
        ]);
    }
}
