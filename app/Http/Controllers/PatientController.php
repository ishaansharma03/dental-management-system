<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:patients,email',
        'phone' => 'required',
        'treatment_type' => 'required',
        'insurance_provider' => 'nullable|string',
        'policy_number' => 'nullable|string',
        'coverage_details' => 'nullable|string',
        'xray_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // 🧠 NEW VALIDATION
    ]);

    // Handle file upload
    $fileName = null;
    if ($request->hasFile('xray_file')) {
        $fileName = time() . '_' . $request->file('xray_file')->getClientOriginalName();
        $request->file('xray_file')->storeAs('public/xrays', $fileName);
    }

    // Create patient
    Patient::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'treatment_type' => $request->treatment_type,
        'insurance_provider' => $request->insurance_provider,
        'policy_number' => $request->policy_number,
        'coverage_details' => $request->coverage_details,
        'xray_file' => $fileName,
    ]);

    return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
}


    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'required',
            'treatment_type' => 'required',
            'insurance_provider' => 'nullable|string',
            'policy_number' => 'nullable|string',
            'coverage_details' => 'nullable|string',
        ]);

        $patient = Patient::findOrFail($id);

        $patient->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'treatment_type' => $request->treatment_type,
            'insurance_provider' => $request->insurance_provider,
            'policy_number' => $request->policy_number,
            'coverage_details' => $request->coverage_details,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}



