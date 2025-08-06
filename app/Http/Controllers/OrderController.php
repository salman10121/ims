<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get(); // Get all orders with the user info
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all(); // Fetch all users for order creation
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,canceled',
        ]);

        Order::create([
        'order_number' => Str::random(10), // Use Str::random() instead
            'user_id' => $validated['user_id'],
            'total_amount' => $validated['total_amount'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all(); // Fetch all users for editing the order
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
