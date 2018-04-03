<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{

    public function shipping()
    {
    	return view('front.shipping-info');
    }

    public function payment()
    {
        return view('front.payment');
    }

    public function paymentstore(Request $request)
    {

        // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_OxSJhPudHFj9u8RKd5fQQlKq");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $customer = \Stripe\Customer::create(array(
                "email" => "paying.user@example.com",
                "source" => $token,
            ));

            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
              "amount" => 999,
              "currency" => "usd",
              "customer" => $customer->id,
            ));


            // create order
            $user = Auth::user();

            $order = $user->orders()->create([
                'total' => Cart::total(),
                'delivered' => 0
            ]);

            $cartItems = Cart::content();

            // if(count($cartItems) == 1){
            //     $order->orderItems()->attach($cartItems['id'],[
            //         'qty' => $cartItems->qty,
            //         'total' => $cartItems->qty * $cartItems->price
            //     ]);
            // }else{

                foreach($cartItems as $cartItem){
                    $order->orderItems()->attach($cartItem->id,[
                        'qty' => $cartItem->qty,
                        'total' => $cartItem->qty * $cartItem->price
                    ]); 
                }

            
            // }
        
        }

        public function charge()
        {
                  $customer_id = "cus_CbaD14FoqvtBFz";

                \Stripe\Stripe::setApiKey("sk_test_OxSJhPudHFj9u8RKd5fQQlKq");


                $charge = \Stripe\Charge::create(array(
                    "amount" => Cart::total()*100,
                    "currency" => "usd",
                    "customer" => $customer_id
                ));
    
        }


}
