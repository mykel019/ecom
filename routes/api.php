<?php

use Illuminate\Http\Request;
use App\Order;
use App\Http\Controllers\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys

Route::post('/payment',function(){

	
        });


Route::get('charge',function(){
	
	        $customer_id = "cus_CbaD14FoqvtBFz";

                \Stripe\Stripe::setApiKey("sk_test_OxSJhPudHFj9u8RKd5fQQlKq");


                $charge = \Stripe\Charge::create(array(
                    "amount" => Cart::total()*100,
                    "currency" => "usd",
                    "customer" => $customer_id
                ));
	
});


	
?>