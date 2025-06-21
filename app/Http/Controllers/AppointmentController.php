<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->latest()->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('appointments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'treatment_type' => 'required|string',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'patient_id' => $request->patient_id,
            'treatment_type' => $request->treatment_type,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'Scheduled',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully!');
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function updateStatus($id, $status)
    {
        $appointment = Appointment::findOrFail($id);

        if (in_array($status, ['Completed', 'Cancelled'])) {
            $appointment->status = $status;
            $appointment->save();

            return redirect()->route('appointments.index')->with('success', "Appointment marked as $status.");
        }

        return redirect()->route('appointments.index')->with('error', 'Invalid status.');
    }

    public function show(string $id)
    {
        // Not used right now
    }

    public function edit(string $id)
    {
        // Not used right now
    }

    public function update(Request $request, string $id)
    {
        // Not used right now
    }
}



