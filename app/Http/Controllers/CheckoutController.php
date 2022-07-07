<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Stripe::setApiKey(
        //     'sk_test_51Kp5tJGRaOhIEKLtouPZzW5F8bA3Dfr1IZzvVnMs7OPGgNYFRBO76yFnmY0m8NYPaFsGr1vqjtK7X2LGdLNpwPdT00wSBnBjMP'
        //     );

        // $intent=PaymentIntent::create([
        //     'amount'=>round(Cart::total()),
        //     'currency'=> 'eur'
        // ] );
        // // dd($intent);
        // // $client_secret="pi_3LI9SpGRaOhIEKLt1f4aB7We_secret_0PpnlXxvs7ZnX3tTjNo8QD8P8";
        // $clientsecret= Arr::get($intent,'client_secret');
         
        return view('checkout.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
