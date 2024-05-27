<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){

        $signingSecret = '1k_test_UVzt5mdJkYWRZxK1C7YimXaV';
        $header_signature = $request->header('Paymongo-Signature');
        $payload= $request->getContent();
        
        $computedSignature = hash_hmac('sha256', $payload, $signingSecret);
        $signature = hash_equals($header_signature, $computedSignature);
        WebhookCall::insert([
          'payload' =>$signature,
        ]);


        

       
    }
}
