@php
    use Gloudemans\Shoppingcart\Facades\Cart;

    use App\Product;
@endphp

@extends('layout.Master')

@section('Content')
@if (Cart::count()>0)
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
                                                    @foreach (Cart::content() as $item )
                                                        <tr>
                                                            <th scope="row" class="border-0" class="text-center">
                                                                <div class="p-2">
                                                                    <img src="{{ asset('img/img01.png') }} " alt="" width="70" class="img-fluid rounded shadow-sm"><br>
                                                                    <div class="ml-3 d-inline-block align-middle">
                                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Nom Produit :   </a></h5><span class="text-muted font-weight-normal font-italic d-block">{{ $item->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="border-0 align-middle" class="text-center"><strong>   {{ $item->price }} Fcfa </strong></td>
                                                            <td class="border-0 align-middle"  class="text-center"><strong>  3  </strong></td>
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
                                        <h5 class="font-weight-bold">{{ Cart::total() }} Fcfa</h5>
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


@else

@endif
  <div class="col-lg-12">
    <p> Votre Panier est vide </p>
  </div>
@endsection





