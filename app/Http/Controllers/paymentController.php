<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){




        $signingSecret = env('PAYMONGO_SECRET');
        $header_signature = $request->header('Paymongo_Signature');

        $header_signature_res =preg_split("/,/",$header_signature);
        $header_time_no_equal = preg_split("/=/",$header_signature_res[0]);
        $header_time_no_equal_res = $header_time_no_equal[1];

        $header_string_no_equal = preg_split("/=/",$header_signature_res[1]);
        $header_string_no_equal_res = $header_string_no_equal[1];

        $payload= $request->getContent();
        
        $computedSignature = hash_hmac('sha256', $header_time_no_equal_res.$header_string_no_equal_res, $payload);


        $signature = hash_equals($header_time_no_equal_res.$header_string_no_equal_res,$computedSignature);
        if($signature){
            WebhookCall::insert([
              'payload' =>$signature,
            ]);
        }else{
            WebhookCall::insert([
              'payload' =>$header_time_no_equal_res.$header_string_no_equal_res.'------ '.,$computedSignature,
            ]);
        }
        


       

       
    }
}

