@extends('layout.Master')
@section('Content')
<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-350 position-relative">
     <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10">
                <div class="col-md-12 p-4 d-flex flex-column position-static container">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h5 class="mb-0"> {{ $content->title }}</h5>
                    <div class="mb-1 text-muted">{{ $content->created_at }}</div>
                    <p class="mb-auto" style="text-align: justify">{!! $content->description !!}</p>
                    <strong class="mb-auto">${{ $content->price }}</strong>

                      <form action="{{ route('cart.store') }}" method="POST">
                          @csrf

                          <input type="hidden" name="product_id" value="{{ $content->id  }}">


                          <button type="submit" class="btn btn-dark"> Ajouter au Panier </button>
                       </form>

                  </div>

            </div>

            <div class="col-lg-3 col-md-2">
                <div class="col-lg-12 col-md-12 d-none d-lg-block">
                    {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                    <img src="{{ asset('storage/'.$content->image) }}" width="200" height="250" alt="image">
                  </div>
            </div>

        </div>

     </div>
</div>
@endsection
