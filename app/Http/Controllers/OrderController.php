<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests\Order as OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name', 'ASC')->get();

        return view('orders.create', [
            'products' => $products
        ]);
    }

    /** Get the productm*/
    public function addItem($id) {

        $product = Product::find($id);

        if(!$product) {
            return;
        }

        return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->description = $request->description;
        $order->publish_at = $request->publish_at;
        $order->total = $request->total;
        $order->save();

        $order->products()->attach($request->product);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::find($order->id);

        if($order) {

            $products = $order->products()->get();

            return view('orders.show', [
                'order' => $order,
                'products' => $products
            ]);
        }
    }

    public function concluded(Order $order)
    {
        $orders = Order::all();
        return view('orders.concluded', [
            'orders' => $orders
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('orders.index');
    }

}
