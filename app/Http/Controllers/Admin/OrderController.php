<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);

        $product = $order->getProduct();

        $is_client = $order->owner_id != null ? 'text-success' : 'text-warning';

        return view('admin.orders.show', compact('order', 'product','is_client'));
    }
    public function edit($id)
    {
        $order = Order::find($id);
        
        $is_client = $order->owner_id != null ? 'text-success' : 'text-warning';

        $status = Order::getStatus();

        return view('admin.orders.edit', compact('order', 'is_client', 'status'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'owner' => 'required|min:3',
            'phone' => 'required',
            'address' => 'required|min:10',
            'quantity' => 'required|numeric'
        ]);
        Order::find($id)->update($request->all());

        return redirect()->route('orders.index');
    }
    public function create()
    {
        return view('admin.orders.create');
    }
    public function store(Request $request)
    {
        return true;
    }
   
}
