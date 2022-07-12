@extends('layout.Master')
@section('Content')
   <div class="container">
      
      <div class='col-lg-12' style="background-color:#bfe2f0">


      <h1 class="col-md"> Merci </h1>
      <h4>Votre commande a été prise en compte ! </h4>

       <p> Vous rencontrez un problème ? <span style="color: rgb(47, 47, 209)"><a href="#" style="list-style-type: none;"> Nous Contacter </a></span></p>

       <a class="btn btn-primary" href="{{ route('products.index') }}" style="list-style: none;"> Continuer sur notre Boutique</a>
      </div>
   </div>
@endsection
