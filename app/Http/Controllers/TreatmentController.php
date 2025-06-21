<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        Treatment::create($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment added successfully!');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('treatments.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment updated successfully!');
    }

    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('treatments.index')->with('success', 'Treatment deleted successfully!');
    }
}

