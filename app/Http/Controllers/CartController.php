<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\StoreWidgetRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\ShopHistory;
use App\Models\TransHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List cart
        $user = Auth::user()->id;

        $cartItems = Cart::where('user_id', $user)->paginate(5);

        return view('cart.cart', compact('cartItems'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
        //  $params = $request->all();
        //  dd($params);

        try {
            // We add the item to the Kart
            $cart = new Cart();
            $cart->user_id = (int)$request->user_id;
            $cart->prod_id = (int)$request->prod_id;
            $cart->widget_name = $request->widget_name;
            $cart->current_price = $request->price;
            $cart->amount = (int)$request->amount;
            // dd($cart);
            $cart->save();

            return redirect()->back()->withSuccess('Widget has been added to the Cart');

        } catch (\Throwable $th) {
            //throw $th;

            \Log::debug($th);

            return redirect()->back()->withFail('Unable to add at the moment.');
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        // Drop from table
        $cart->delete();

    }

    public function placeOrder(Request $request)
    {
        # Method for placing order...
         $params = $request->all();
        //  dd($params);

        $transTotal = collect();
        $transProds = collect();
        $transAmounts = collect();

        //  First update amounts
        foreach ($params as $key => $item) {
            # code...
            // dd($key);

            if (is_numeric($key))  {
                # code...
                // dd($item);
                // get the item
                $cart = Cart::findOrFail($key);

                // push to transt total
                $transTotal->push($cart->current_price * $item);
                $transProds->push($cart);
                $transAmounts->push($item);

            }

        }

        // dd($transAmounts);

        // Generate transaction Header
        $header = new TransHistory();
        $header->user_id = Auth::user()->id;
        $header->transaction_total = $transTotal->sum();
        $header->products = count($transTotal);
        $header->save();

        // dd($header);

        // Store products
        foreach ($transProds as $key => $prod) {
            # We store it in prodHist...
            // dd($prod);
            $histProd = new ShopHistory();
            $histProd->transac_id = $header->id;
            $histProd->prod_name = $prod->widget_name;
            $histProd->current_price = $prod->current_price;
            $histProd->amount = $transAmounts[$key];
            $histProd->save();
            // dd($histProd);

            // we drop the item from the cart
            $this->destroy($prod);

        }

        return redirect('/widgets')->withSuccess('Order has been placed');

    }

}
