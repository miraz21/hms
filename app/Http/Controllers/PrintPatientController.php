<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;

class PrintPatientController extends Controller
{
    public function index()
    {
          $patients = Patient::all();
          return view('patients.printpatientadmit')->with('patients', $patients);;
    }
    public function prnpriview($id)
    {
          $patient = Patient::find($id);
          return view('patients.patientadmit')->with('patient', $patient);;
    }
}
