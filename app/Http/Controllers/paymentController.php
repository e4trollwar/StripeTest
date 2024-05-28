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

        //contains the time ex: 1716800978
        $header_time_no_equal_res = $header_time_no_equal[1];

        $header_string_no_equal = preg_split("/=/",$header_signature_res[1]);

        //contains the test mode signature without the 'te=' ex: 1447a89e7ecebeda32sffs62cdca3fa51cad7e77a0e56ff536d0ce8e108d8bd
        $header_string_no_equal_res = $header_string_no_equal[1];

        $payload= $request->getContent();
        
        //concatinated the time and $request->getContent() ex:1716800978{json response data} and the second value is my secret key ex: sk_test_UVzt5mdhyRgoZxK1C7YimXaV

        $computedSignature = hash_hmac('sha256',$header_time_no_equal_res.$payload, $signingSecret);


        $signature = hash_equals($computedSignature,$header_string_no_equal_res);
        if($signature == 1 || $signature == true){
            WebhookCall::insert([
              'payload' =>'valid',
            ]);
        }else{
            WebhookCall::insert([
              'payload' =>$computedSignature.'------'.$header_string_no_equal_res,
            ]);
        }
        


       
    }
}
