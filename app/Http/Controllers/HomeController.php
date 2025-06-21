<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();
        $totalAppointments = Appointment::count();
        $completedAppointments = Appointment::where('status', 'Completed')->count();
        $cancelledAppointments = Appointment::where('status', 'Cancelled')->count();
        $upcomingAppointments = Appointment::where('appointment_date', '>=', Carbon::today())->count();

        return view('home', compact(
            'totalPatients',
            'totalAppointments',
            'completedAppointments',
            'cancelledAppointments',
            'upcomingAppointments'
        ));
    }
}

