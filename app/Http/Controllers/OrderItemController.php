<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
public function create()
{
    return view('admin.order_items.create', [
        'orders' => Order::all(),
        'products' => Product::all()
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::find($request->product_id);
    $price = $product->price;
    $subtotal = $price * $request->quantity;

    OrderItem::create([
        'order_id' => $request->order_id,
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'price' => $price,
        'subtotal' => $subtotal,
    ]);

    return redirect()->route('order-items.index')->with('success', 'Product added to order!');
}}
