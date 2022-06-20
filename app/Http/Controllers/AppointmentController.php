<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

use App\Models\PathologicalTest;

use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
         if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
        $appointments= Appointment::orderBy('id','desc')->paginate(10);

        return view('appointment.index', compact('appointments'));
      }
      if(Auth::user()->usertype==4)
      {
      $appointments= Appointment::orderBy('id','desc')->paginate(10);

      return view('appointment.index', compact('appointments'));
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
        $appointment = Appointment::all();
        return view('appointment.create',compact('appointment'));
    }

    public function store(Request $request)
    { 
        $request->validate([
            'appoint_name'=>'required',
            'phone'=>'required',
            'age'=>'required',
            'problem'=>'required',
            'doctor'=>'required',
            'room'=>'required',
            'appointment_fee'=>'required',
            'date'=>'required',
             ]);
        try{
  

         $data=[
        'appoint_name'=>$request->input('appoint_name'),
        'phone'=>$request->input('phone'),
        'age'=>$request->input('age'),
        'problem'=>$request->input('problem'),
        'doctor'=>$request->input('doctor'),
        'room'=>$request->input('room'),
        'appointment_fee'=>$request->input('appointment_fee'),
        'date'=>$request->input('date'),
        ];

        Appointment::create($data);
        
        return redirect()->route('appointment.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function delete($id)
    {
        $appointment=Appointment::find($id);

        $appointment->delete();
        return redirect()->back();
    }
}
