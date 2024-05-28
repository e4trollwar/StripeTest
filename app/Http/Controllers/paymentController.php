<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){




        $signingSecret = 'sk_test_UVzt5mdJkYWRZxK1C7YimXaV';
        $header_signature = $request->header('Paymongo_Signature');

        $header_signature_res =preg_split("/,/",$header_signature);
        $header_time_no_equal = preg_split("/=/",$header_signature_res[0]);
        $header_time_no_equal_res = $header_time_no_equal[1];

        $header_string_no_equal = preg_split("/=/",$header_signature_res[1]);
        $header_string_no_equal_res = $header_string_no_equal[1];

        $payload= $request->getContent();
        
        $computedSignature = hash_hmac('sha256',$header_time_no_equal_res.$payload, $signingSecret);


        $signature = hash_equals($header_string_no_equal_res.$header_string_no_equal_res,$computedSignature);
        if($signature == 1 || $signature == true){
            WebhookCall::insert([
              'payload' =>'valid',
            ]);
        }else{
            WebhookCall::insert([
              'payload' =>$header_string_no_equal_res.'------ '.$computedSignature,
            ]);
        }
        


       
    }
}

