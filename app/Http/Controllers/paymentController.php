<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WebhookCall;

class paymentController extends Controller
{
    //

    public function test(Request $request){

        $endpoint_secret = 'sk_test_UVzt5mdJkYWRZxK1C7YimXaV';
        $payload= @file_get_contents('php://input');
        
             
             
        WebhookCall::insert([
          'payload' =>$request->getContent(),
        ]);


        
      

    }
}
