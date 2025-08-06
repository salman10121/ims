<?php

// app/Http/Controllers/AjaxPracticeController.php

namespace App\Http\Controllers;

use App\Models\AjaxPractice;
use Illuminate\Http\Request;

class AjaxPracticeController extends Controller
{
    public function index()
    {
        $items = AjaxPractice::all();
        return view('ajaxpractice.index', compact('items'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:ajax_practices,email,',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'status' => 'required|string',
    ]);

        $item = AjaxPractice::create($request->only('name', 'description'));
        return response()->json($item);
    }

    public function edit($id)
    {
        return response()->json(AjaxPractice::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:ajax_practices,email,' . $id, // use $id in update
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $item = AjaxPractice::findOrFail($id);
        $item->update($request->only('name', 'description'));
        return response()->json($item);
    }

    public function destroy($id)
    {
        AjaxPractice::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
