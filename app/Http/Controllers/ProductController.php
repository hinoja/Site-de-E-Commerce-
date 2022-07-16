<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(request()->categorie)
        // {

        //     $product=Product::with('categories')->whereHas('categories',function($query) { $query->where('slug',request()->categorie); });


        // }else{
        //       $product=Product::with('categories')->paginate('4');
        // }



        if (request()->categorie) {
            $product= Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->orderBy('created_at','desc')->paginate(6);
        } else {
            $product = Product::with('categories')->paginate(6);
        }




            return view('Products.index',['product'=>$product]);
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
    public function show($slug)
    {
        $product=Product::Where('slug',$slug)->firstOrFail();
        return view('Products.show',['content'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function search()
    // {

    //      $q=request()->input('q');
    //      dd($q);
    //      $products=Product::where('title','like',"%$q%")
    //      ->orwhere('description','like',"%$q%")
    //      ->paginate(6);
    //      return view('partials.search')->with('products',$products);
    // }

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
    public function search()
    {
        $q=request()->input('q');

        $products=Product::where('title','like',"%$q%")
        ->orwhere('description','like',"%$q%")
        ->paginate(6);
        return view('Products.search')->with('products',$products);
    }
}
