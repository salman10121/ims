<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('layout.app');
    }

    public function reportDashboard()
{
    $totalProducts = Product::count();
    $totalSuppliers = Supplier::count();
    $totalCustomers = Customer::count();
    $lowStockItems = Product::where('quantity', '<', 10)->count();

    return view('dashboard.index', compact('totalProducts', 'totalSuppliers', 'totalCustomers', 'lowStockItems'));
}

}
