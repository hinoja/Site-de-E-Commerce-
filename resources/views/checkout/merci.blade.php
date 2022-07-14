@extends('layout.Master')
@section('Content')
   <div class="container">

      <div class='col-lg-12' style="text-align:center;  background-color:#bfe2f0;padding :10px;" >


      <h1 class="col-md"> Merci de nous faire confiance </h1>

      <br><br><br>
      <h4>Votre commande a été prise en compte ! </h4>

       <p> Vous rencontrez un problème ? <span style="color: rgb(47, 47, 209)"><a href="#" style="list-style-type: none;"> Nous Contacter </a></span></p>

       <a class="btn btn-primary" href="{{ route('products.index') }}" style="list-style: none;"> Continuer sur notre Boutique</a>

    <br><br>
    </div>
   </div>
@endsection
