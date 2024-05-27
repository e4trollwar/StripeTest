<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){




        $signingSecret = env('PAYMONGO_SECRET');
        $header_signature = $request->header('Paymongo-Signature');
        $header_signature_final_res =preg_split("/,/",$header_signature);


        $payload= $request->getContent();
        
        $computedSignature = hash_hmac('sha256', $payload, $signingSecret);


        $signature = hash_equals($header_signature_final_res[1], $computedSignature);
        if($signature){
            WebhookCall::insert([
              'payload' =>$payload,
            ]);
        }else{
            WebhookCall::insert([
              'payload' =>'invalid',
            ]);
        }
        


        

       
    }
}
