@extends('layout.Master')













@section('Content')


     @foreach ($products as $item )
        <div class="col-md-6" >
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div style="padding-bottom:15px " class="col p-4   d-flex flex-column position-static" style="text-align: center">
                <small class="d-inline-block mb-2 text-success">
                        @foreach ( $item->categories as $category )
                            {{ $category->name }}{{$loop->last ? '' : ', '  }}
                        @endforeach
                </small>
                <h5 class="mb-0"> {{ $item->title }}</h5>
                <div class="mb-1 text-muted">{{ $item->created_at }}</div>
                <p class="mb-auto">{{ $item->subtitle }}</p>
                <strong class="display-6 mb-2 text-secondary">${{ $item->price }}</strong>

                {{-- <a href="{{ route('products.show',$item->slug) }}" class="stretched-link btn btn-primary">voir l'article</a> --}}
                <a href="{{ route('products.show', $item->slug) }}" class="stretched-link btn btn-info" style="margin-bottom: 6px;"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>

            </div>
            <div class="col-auto d-none d-lg-block">
                {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                    <img src="{{ asset('storage/'.$item->image) }}" alt="test" width="200" height="250">
            </div>
            </div>
        </div>
     @endforeach
     {{ $products->appends(request()->input())->links() }}
       {{-- {{ $products->simplePaginate(3) }} --}}
       {{-- {{ $products->links() }} --}}

@endsection










{{--
@section('content')
  @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-3 d-flex flex-column position-static">
          <small class="d-inline-block text-info mb-2">
            @foreach ($product->categories as $category)
                {{ $category->name }}{{ $loop->last ? '' : ', '}}
            @endforeach
          </small>

          <h5 class="mb-0">{{ $product->title }}</h5>
          <p class="mb-3 text-muted">{{ $product->subtitle }}</p>
          <strong class="display-4 mb-4 text-secondary">{{ $product->getPrice() }}</strong>
          <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-info"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('storage/' . $product->image) }}" alt="">
        </div>
      </div>
    </div>
  @endforeach
  {{ $products->appends(request()->input())->links() }}
@endsection
 --}}
