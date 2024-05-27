<?php

namespace App\Handler;
use App\Models\Test;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

//The class extends "ProcessWebhookJob" class as that is the class 
//that will handle the job of processing our webhook before we have 
//access to it.

class ProcessWebhook extends ProcessWebhookJob
{
    public function handle()
    {
        $dat = json_decode($this->webhookCall, true);
        $data = $dat['payload'];
    

        //Acknowledge you received the response
        http_response_code(200);
    }
}