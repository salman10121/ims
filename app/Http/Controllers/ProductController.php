<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

  public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();

        return view('products.create', compact('categories', 'brands', 'units'));
    }


    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'brand_id' => 'required|exists:brands,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'brand_id' => $request->brand_id,
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'image'       => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $units = Unit::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories', 'brands', 'units'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
                'unit_id' => 'required|exists:units,id',
            'brand_id' => 'required|exists:brands,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'brand_id' => $request->brand_id,
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'image'       => $product->image,
            'description' => $request->description,
            'stock' => $request->stock,

        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
public function addStock(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);
    $product->increment('quantity', $request->quantity); // Update the product stock

    // Log the stock addition
    StockLog::create([
        'product_id' => $product->id,
        'type' => 'in', // 'in' means stock added
        'quantity' => $request->quantity,
    ]);

    return back()->with('success', 'Stock added successfully.');
}
public function reduceStock(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($product->quantity < $request->quantity) {
        return back()->with('error', 'Not enough stock available.');
    }

    // Reduce the stock
    $product->decrement('quantity', $request->quantity);

    // Log the stock reduction
    StockLog::create([
        'product_id' => $product->id,
        'type' => 'out', // 'out' means stock reduced
        'quantity' => $request->quantity,
    ]);

    return back()->with('success', 'Stock reduced successfully.');
}

    public function stockLogs()
    {
        $stockLogs = StockLog::with('product')->latest()->get();
        return view('stock.stocklist', compact('stockLogs'));
    }
    public function lowStockProducts()
    {
        $products = Product::where('quantity', '<=', 10)->get(); // You can set your own threshold
        return view('products.low_stock', compact('products'));
    }
}
