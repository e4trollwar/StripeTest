<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){




        $signingSecret = 'sk_test_UVzt5mdJkYWRZxK1C7YimXaV';
        $header_signature = $request->header('Paymongo-Signature');
        $header_te =preg_split("/,/",$header_signature);
        $header_te_res = $header_te[1];
        $header_te_res_one =preg_split("/=/",$header_te_res);
        $header_te_res_final_res = $header_te_res_one[1];


        $payload= $request->getContent();
        
        $computedSignature = hash_hmac('sha256', $payload, $signingSecret);


        $signature = hash_equals($header_te_res, $computedSignature);
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
