<?php

namespace App\Http\Controllers;



use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Kp5tJGRaOhIEKLtouPZzW5F8bA3Dfr1IZzvVnMs7OPGgNYFRBO76yFnmY0m8NYPaFsGr1vqjtK7X2LGdLNpwPdT00wSBnBjMP');


		$amount = Cart::total();
		$amount *= Cart::total();
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			      'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'XAF',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.index',compact('intent'));

    }

    public function afterPayment()
    {
        Cart::destroy();
        echo '<h1>Merci pour nous avoir fait Confiance.</h1>';

    }
}
