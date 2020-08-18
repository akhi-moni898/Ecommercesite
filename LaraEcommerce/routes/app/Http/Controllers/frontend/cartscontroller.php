<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Auth;

class cartscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
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
          


          $this->validate($request,[
             'product_id'=>'required'

         ],

         [
         'product_id.required' => 'please choose a product '

          ]);

          $cart = Cart::orWhere('user_id',Auth::id())
          ->orWhere('ip_address',request()->ip())
          ->orWhere('product_id',$request->product_id)
          ->first();
         
    if (!is_null($cart)) {
       
 
       $cart ->increment('product_quantity');
    }
 else{
      $cart = new Cart();
            if (Auth::Check()) {

                 $cart->user_id = Auth::id();

              
            }
            $cart->ip_address = request()->ip();

            $cart->product_id = $request->product_id;
            $cart->save();

 }
           
             session()->flash('success','product added to the cart');
             return back();
            

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
