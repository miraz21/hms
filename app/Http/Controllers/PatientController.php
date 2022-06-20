<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;

use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
    if(Auth::user()->usertype==1)
    {
      $patients=Patient::orderBy('id','desc')->paginate(10);
      return view('patients.index', compact('patients'));
    }
    if(Auth::user()->usertype==4)
    {
      $patients=Patient::orderBy('id','desc')->paginate(10);
      return view('patients.index', compact('patients'));
    }
    else{
        return redirect()->back();
    }
    }
     else{
    return redirect('login');
    }
    }
      public function create()
      {
          $appointment=Appointment::all();
          $patients=Patient::all();
          return view('patients.create', compact('appointment'));
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'appointment_id'=>'required',
          'room'=>'required',
          'reason'=>'required',
          'total'=>'required',
          'pay_amount'=>'required',
          'due_amount'=>'required',
          'date'=>'required',
           ]);
  
           $data=[
          'appointment_id'=>$request->input('appointment_id'),
          'room'=>$request->input('room'),
          'reason'=>$request->input('reason'),
          'total'=>$request->input('total'),
          'pay_amount'=>$request->input('pay_amount'),
          'due_amount'=>$request->input('due_amount'),
          'date'=>$request->input('date'),
          ];
  
          Patient::create($data);
          
          return redirect()->route('patient.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $patient=Patient::find($id);
  
          $patient->delete();
          return redirect()->back();
      }
}
