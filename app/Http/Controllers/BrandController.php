<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('brands', 'public');
} else {
    $imagePath = null;
}

    Brand::create([
        'name' => $request->name,
        'image' => $imagePath,
    ]);

    return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
}


    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $brand = Brand::findOrFail($id);

    if ($request->hasFile('image')) {
        // Optional: delete old image file here if needed
        $imagePath = $request->file('image')->store('brands', 'public');
        $brand->image = $imagePath;
    }

    $brand->name = $request->name;
    $brand->save();

    return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
}


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
