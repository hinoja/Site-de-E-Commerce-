<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('Cart.index');
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

            $duplicata= Cart::search(function ($cartItem,$row) use($request)
            {
                return $cartItem->id === $request->product_id;
            });
          if($duplicata->isNotEmpty())
            {
                return redirect()->route('products.index')->with('success'," Le produit a déjà  été ajouté");
            }

                 $product=Product::find($request->product_id);
                Cart::add($product->id,$product->title,1,$product->price)
                ->associate('Product');

                return redirect()->route('products.index')->with('success',"Le produit a bien été ajouté");



            return redirect()->route('products.index')->with('success'," Le produit a déjà  été ajouté");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respon
     *
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
    public function destroy($rowId)
    {
        // dd(Cart::content());
        Cart::remove($rowId);
        return back()->with('danger',"Le produit à été supprimé");
    }
}
