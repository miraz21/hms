<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

class PrintAppointmentController extends Controller
{
    public function index()
    {
          $appointments = Appointment::all();
          return view('appointment.printappointment')->with('appointments', $appointments);;
    }
    public function prnpriview($id)
    {
          $appointment = Appointment::find($id);
          return view('appointment.appointment_form')->with('appointment', $appointment);;
    }
}
