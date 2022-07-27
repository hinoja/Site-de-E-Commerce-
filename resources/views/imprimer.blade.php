@php
    use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

@endphp
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      @yield('JsonMeta')
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.8e8.1">
    <title>Blog Template · Bootstrap v4.6</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">




    <!-- Bootstrap core CSS -->
<link href="{{ asset('bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="{{ asset('') }}"> --}}


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('blog.css') }}" rel="stylesheet">
  </head>
  <body>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-left">
      <div class="col-4 pt-1">
        <a class="text-muted" href="{{ route('cart.index') }}"> Panier  <span class="badge badge-pill badge-primary"> {{ Cart::count() }}</span></a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{ route('products.index') }}">E-Commerce</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-justify">
         @include('partials.search')
        {{-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> --}}
         @include('partials.auth')
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">


            <div class="px-4 px-lg-0">
                <div class="pb-5">
                    <div class="row">
                            <div class="col-xs-12 col-lg-12  ">
                                <!-- For demo purpose -->
                                <div class="container text-red py-5 text-center">
                                    <h1 class="display-4"> Mon Panier </h1>
                                </div>
                                <!-- End -->

                                <div class="pb-5">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-lg-12 col-xs-12">


                                                        <!-- Shopping cart table -->
                                                <div class=" ">
                                                    <table class="table table-bordered table-striped ">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col" class="border-0 bg-light">
                                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                                        </th>
                                                        <th scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Price</div>
                                                        </th>
                                                        <th scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Quantity</div>
                                                        </th>
                                                        <th scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Remove</div>
                                                        </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cart as $item )
                                                            <tr>
                                                                <th scope="row" class="border-0" class="text-center">
                                                                    <div class="p-2">
                                                                        <img src="{{ asset('img/img01.png') }} " alt="" width="70" class="img-fluid rounded shadow-sm"><br>
                                                                        <div class="ml-3 d-inline-block align-middle">
                                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Nom Produit :   </a></h5><span class="text-muted font-weight-normal font-italic d-block">{{ $item->name }}</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class="border-0 align-middle" class="text-center"><strong>   {{ $item->subtotal() }} Fcfa </strong></td>
                                                                <td class="border-0 align-middle"  class="text-center">
                                                                    <strong>
                                                                        <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->qty }}">
                                                                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                                            @endfor
                                                                        </select>

                                                                    </strong>
                                                                </td>

                                                                <td class="border-0 align-middle"  class="text-center">
                                                                        <form action="{{ route('cart.delete',$item->rowId) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input class="btn btn-outline-danger" type="submit" value="Delete">
                                                                        </form>

                                                                    </td>
                                                            </tr>
                                                            <br>
                                                        @endforeach


                                                    </tbody>
                                                    </table>
                                                </div>
                                                <!-- End -->

                                    </div>
                                    </div>

                                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                    <div class="col-lg-6">
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                                        <div class="p-4">
                                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                                        <div class="input-group mb-4 border rounded-pill p-2">
                                            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                            <div class="input-group-append border-0">
                                            <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                                        <div class="p-4">
                                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Details de la commande  </div>
                                        <div class="p-4">
                                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ Cart::subtotal() }} Fcfa</strong></li>
                                            {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li> --}}
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>{{ Cart::tax() }} Fcfa</strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                            <h5 class="font-weight-bold">

                                                @if ( isset($newSubtotal) )
                                                    {{ $newSubtotal }}
                                                @else
                                                {{ Cart::total() }} Fcfa
                                                @endif



                                            </h5>
                                            </li>
                                        </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la Caisse </a>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

    </nav>
  </div>


<footer class="blog-footer">
    <p>
      <a href="https://getbootstrap.com/">Janohi Gordon</a> - 🛒 Application E-Commerce avec Laravel 6
    </p>
    <p>
      <a href="#">Revenir en haut</a>
    </p>
  </footer>

@yield('extra-js')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
  @yield('extrajavascript')
</html>
