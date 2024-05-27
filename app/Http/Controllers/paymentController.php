<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){


        $signature = $request->header('Paymongo-Signature');
            if (! $signature) {
                return false;
            }



            $publicKey = "pk_test_5TCNZDKZEKYeaaQLs55pZEqR";

            if (!$publicKey) {
                return false;
            }

            $payload = $request->getContent();

            $signature = base64_decode($signature);

            $publicKey = openssl_pkey_get_public($publicKey);

            $result = openssl_verify($payload, $signature, $publicKey, OPENSSL_ALGO_SHA256);

            if ($result === 1) {
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
