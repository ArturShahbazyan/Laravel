<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function show() {
        
        return view('payment');
    }

    public function payment(Request $request) {


        \Stripe\Stripe::setApiKey('sk_test_ToYC0M924Q0VKxdt3B7Y3ZfT00wfwUBE1T');

        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

         $c_firstname = $request->input('c_firstname');
         $c_lastname = $request->input('c_lastname');
         $c_email = $request->input('c_email');

          $token = $request->input('stripeToken');


        // Create a Customer
        $customer = \Stripe\Customer::create(array(

            "email" => $c_email,    
            "source" => $token,

        ));

      
       // Charge the Customer instead of the card
        \Stripe\Charge::create(array(
            "amount" => 3000, 
            "currency" => "usd",
            "description" => "Example customer",
            "customer" => $customer->id
        ));
 

    }
}