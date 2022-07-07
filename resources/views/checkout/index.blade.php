<?php

use Stripe\Stripe;
use Stripe\Checkout\Session;
require_once __DIR__.'/../../../vendor/autoload.php';
 Stripe::setApiKey(

'sk_test_51Kp5tJGRaOhIEKLtouPZzW5F8bA3Dfr1IZzvVnMs7OPGgNYFRBO76yFnmY0m8NYPaFsGr1vqjtK7X2LGdLNpwPdT00wSBnBjMP'
);

$session =Session::create([
    'line_items' => [[
      'price_data' => [
        'currency' => 'eur',
        'product_data' => [
          'name' => 'T-shirt',
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 2,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
  ]);


?>

@extends('layout.Master')

@section('extrajavascript')

    <script src="https://js.stripe.com/v3/"></script>
@endsection


@section('Content')
       <div class="col-md-12">
            <h1>Page de Paiement</h1>

            <div class="row">
                <div class="col-md-6  " >
                  {{-- <form action="#" class="my-4"> --}}
                    {{-- <div id="card-element">

                    </div>
                    <div class="card-errors" role="alert">


                   </div> --}}
                   <button id="checkout-button" class="btn btn-success mt-4" >Proceder au Paiement</button>
                  {{-- </form> --}}

                </div>
            </div>
        </div>


@endsection


@section('extra-js')
     <script>
        // var stripe=Stripe('pk_test_51Kp5tJGRaOhIEKLtSfp9Y5higTtJ6JZy99douU4Zi8Ag96nG51gnuidL5yTCLvZMeKjfVT5df6Stl07pfhw4aPuN00J1hZU3Bo');
        // var elements=stripe.elements();
        // var style={

        //     base:{
        //         color:"#32325d",
        //         fontFamily:'"Helvetica Neue", Helvetica san-serif' ,
        //         fontSmoothing:antialiased,
        //         fontSize:'16px',
        //         "::placeholder":{
        //             color:"#aab7c4"
        //                         }
        //     },

        //     invalid: {
        //         color:"#fa755a",
        //         iconcolor:"#fa755a"
        //     }

        // };
        // var card =elements.create("card",{style: style});
        // card.mount("#card-element");
        const stripe=Stripe('pk_test_51Kp5tJGRaOhIEKLtSfp9Y5higTtJ6JZy99douU4Zi8Ag96nG51gnuidL5yTCLvZMeKjfVT5df6Stl07pfhw4aPuN00J1hZU3Bo')
          const btn=document.getElementById("checkout-button")
          btn.addEventListener('click',function()
          {
             e.preventDefault();
             stripe.redirectToCheckout({
                sessionId:  "<?php echo $session->id ?>"
             })
          })
     </script>
@endsection

