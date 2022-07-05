<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PatientPayment;

use App\Models\Appointment;

use App\Models\Patient;

use Illuminate\Support\Facades\Auth;

class PatientPaymentController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
      if(Auth::user()->usertype==1)
      {
      $patientpayments=PatientPayment::orderBy('id','desc')->paginate(10);
      return view('patientpayment.index', compact('patientpayments'));
    }
    if(Auth::user()->usertype==4)
    {
    $patientpayments=PatientPayment::orderBy('id','desc')->paginate(10);
    return view('patientpayment.index', compact('patientpayments'));
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
          $patientpayments=PatientPayment::all();
          return view('PatientPayment.create', compact('appointment'));
      }
  
      public function store(Request $request)
      {   
        // return $request->all();
          try{
           $request->validate([
          'appointment_id'=>'required',
          'total'=>'required',
          'pay_amount'=>'required',
          // 'date'=>'required',
           ]);
  
           $data=[
          'appointment_id'=>$request->input('appointment_id'),
          'total'=>$request->input('total'),
          'pay_amount'=>$request->input('pay_amount'),
          // 'date'=>$request->input('date'),
          ];
  
          PatientPayment::create($data);
        //   Patient::where('id',$request->patient_id)->increment(['total','pay_amount', 
        //   $request->total,$request->pay_amount]);

        $appointment = Patient::where('appointment_id', $request->appointment_id)->first();
        $appointment->increment('total', $request->total);
        $appointment->increment('pay_amount', $request->pay_amount);
        $due_amount = $appointment->total - $appointment->pay_amount;
        $appointment->update(['due_amount' => $due_amount]);
          
          return redirect()->route('patientpayment.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $patientpayment=PatientPayment::find($id);
  
          $patientpayment->delete();
          return redirect()->back();
      }
}
