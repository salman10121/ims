<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|',
            'address' => 'nullable|string',
        ]);

        // Create and save the new customer
        Customer::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    // Show the form for editing the specified customer
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Update the specified customer in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|',
            'address' => 'nullable|string',
        ]);

        // Find the customer and update their data
        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Remove the specified customer from storage
    public function destroy($id)
    {
        // Find and delete the customer
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
