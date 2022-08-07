<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PathologicalTestPayment;

use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;

class PathologicalTestPaymentsController extends Controller
{
    public function index()
    {
     if(Auth::id())
     {
    if(Auth::user()->usertype==1)
    {
      $pathologicaltestpayments=PathologicalTestPayment::orderBy('id','desc')->paginate(10);
      return view('pathologicaltestpayment.index', compact('pathologicaltestpayments'));
    }
    if(Auth::user()->usertype==4)
    {
      $pathologicaltestpayments=PathologicalTestPayment::orderBy('id','desc')->paginate(10);
      return view('pathologicaltestpayment.index', compact('pathologicaltestpayments'));
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
          $pathologicaltestpayment=PathologicalTestPayment::all();
          return view('pathologicaltestpayment.create', compact('appointment','pathologicaltestpayment'));
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'appointment_id'=>'required',
          'total'=>'required',
          'pay_amount'=>'required',
          'due_amount'=>'required',
           ]);
  
           $data=[
          'appointment_id'=>$request->input('appointment_id'),
          'total'=>$request->input('total'),
          'pay_amount'=>$request->input('pay_amount'),
          'due_amount'=>$request->input('due_amount'),
          ];
  
          PathologicalTestPayment::create($data);
          
          return redirect()->route('pathologicaltestpayment.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $pathologicaltestpayment=PathologicalTestPayment::find($id);
  
          $pathologicaltestpayment->delete();
          return redirect()->back();
      }
}
