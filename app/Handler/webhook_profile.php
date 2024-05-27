<?php
namespace App\Handler;
use App\Models\Test;
use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class Webhook_profile implements WebhookProfile
{
    /**
     * @param Request $request
     * @return bool
     */
    public function shouldProcess(Request $request): bool
    {
        // you can filter out request you want to save into the DB here
        if ($request->has('user')) {
            return true;
        }
        

         echo $request;

         /*foreach($request->all() as $key => $value) {
            $data = $request[$key]['attributes']['payment_intent']['attributes']['payments'];
            
            foreach($data as $key => $value){
                $status = $data[$key]['attributes']['status'];
                Test::insert([
                    'test' => $status,
                    

        ]);


            }
        }*/
        return false;
    }
}