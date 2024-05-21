<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;
use App\Models\Test;

class WebhookJobHandlerForAppOne extends ProcessWebhookJob
{
    public function __construct(){
      
        $this->test = new Test();
       
    }
    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    public function handle()
    {
        //You can perform an heavy logic here
        logger($this->webhookCall);
        sleep(10);
        logger("I am done");

        

    }
}