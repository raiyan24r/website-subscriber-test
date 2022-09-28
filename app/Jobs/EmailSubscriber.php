<?php

namespace App\Jobs;

use App\Mail\NewPostMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EmailSubscriber implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $title, $description, $to;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $description, $to)
    {
        $this->title = $title;
        $this->description = $description;
        $this->to = $to;
    }



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to)->send(new NewPostMail($this->title, $this->description));
    }
}
