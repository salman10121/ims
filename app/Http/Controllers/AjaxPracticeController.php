<?php

// app/Http/Controllers/AjaxPracticeController.php

namespace App\Http\Controllers;

use App\Models\AjaxPractice;
use Illuminate\Http\Request;

class AjaxPracticeController extends Controller
{
    /**
     * Show list
     */
    public function index()
    {
        $records = AjaxPractice::latest()->get();
        return view('ajaxpractice.index', compact('records'));
    }

    /**
     * Store / Update record
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status'  => 'required|in:active,inactive',
        ]);

        $record = AjaxPractice::updateOrCreate(
            ['id' => $request->id],
            $request->only(['name', 'email', 'phone', 'address', 'status'])
        );

        return response()->json([
            'success' => $request->id ? 'Record updated successfully.' : 'Record created successfully.',
            'data'    => $record
        ]);
    }

    /**
     * Edit record
     */
    public function edit($id)
    {
        $record = AjaxPractice::findOrFail($id);
        return response()->json($record);
    }

    /**
     * Delete record
     */
    public function destroy($id)
    {
        AjaxPractice::findOrFail($id)->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
}
