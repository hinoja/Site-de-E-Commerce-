<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use DateTime;


use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
$search=[];
class CheckoutController extends Controller
{

    public function checkout()
    {


        if(Cart::count()<=0)
        {
                return redirect()->route('products.index');
        }
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Kp5tJGRaOhIEKLtouPZzW5F8bA3Dfr1IZzvVnMs7OPGgNYFRBO76yFnmY0m8NYPaFsGr1vqjtK7X2LGdLNpwPdT00wSBnBjMP');


		 $amount = ((int)(Cart::total()))*100;
		//  $amount *= 100;
		//  $amount *= 1;

        // $amount =  round((floatval($amount))) ;

        $payment_intent = \Stripe\PaymentIntent::create([
		    'description' => 'Stripe Test Payment',
			'amount' =>$amount,//correctement formater avant d'envoyer,imperatif (A faire)
			'currency' => 'XAF',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
         $search=$payment_intent;
		$intent = $payment_intent->client_secret;
//

	        	return view('checkout.index',['intent'=>$payment_intent]);
		// return view('checkout.index',compact('intent'));

    }

   public function ThankYou()
   {
     return   view('checkout.merci') ;
   }

    public function afterPayment(Request $request)
    {
        // global $search;
    //    dd($search);
    //   dd($request);
          //store payment in database

          $paymentIntent=$request->json()->all();//a verifier si la recuperation est effective à via REQUEST
          $order=new Orders();
          Cart::destroy();
          return   view('checkout.merci') ;

        //  dd($request->json()->all());



        //    $order->payment_id= $paymentIntent['paymentIntent']['id'];
        //   $order->amount= $paymentIntent['paymentIntent']['amount'];
        //   $order->payment_created_at=(new DateTime())
        //                               ->setTimestamp($paymentIntent['paymentIntent']['created'])
        //                               ->format('Y-m-d H-i-s');

        //       $products=[];
        //       $i=0;
        //       foreach(Cart::content() as $product)
        //       {
        //              $products['product_id_'.$i][]=$product->qty;
        //              $products['product_id_'.$i][]=$product->price;
        //              $products['product_id_'.$i][]=$product->name;
        //              $i++;
        //       }
        //       $order->products=serialize($products);
        //       $order->user_id=15;

        //       $order->save();
        //       return  redirect()->route('checkout.merci') ;






            //   if($payment_intent['paymentIntent']['status'] === 'succeeded')
            //   {
            //     Cart::destroy();
            //     //echo '<h1>Merci pour nous avoir fait Confiance.</h1> Payement effectué avec succès';
            //     Session::flash('succeed','Votre Commande a  été traitée avec Succès ');
            //     return response()->json(['succeed'=>'Payment intent succeede']);
            //   }
            //   else
            //   {
            //     echo '<h1>Merci pour nous avoir fait Confiance.</h1> Error dans le  Payement ';
            //     return response()->json(['succeed'=>'Payment Not Intent succeede']);
            //   }

    }
}
