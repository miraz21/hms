<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AddTestPayment;

use App\Models\Appointment;

use App\Models\PathologicalTestPayment;

use Illuminate\Support\Facades\Auth;

class AddTestPaymentsController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
      if(Auth::user()->usertype==1)
      {
      $addtestpayments=AddTestPayment::orderBy('id','desc')->paginate(10);
      return view('addtestpayment.index', compact('addtestpayments'));
    }
    if(Auth::user()->usertype==4)
    {
    $addtestpayments=AddTestPayment::orderBy('id','desc')->paginate(10);
    return view('addtestpayment.index', compact('addtestpayments'));
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
          $addtestpayment=AddTestPayment::all();
          return view('addtestpayment.create', compact('appointment'));
      }
  
      public function store(Request $request)
      {   
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
  
          AddTestPayment::create($data);
        //   Customer::where('id',$request->customer_id)->increment(['total','pay_amount',
        //   $request->total, $request->pay_amount]);
       
        $test = PathologicalTestPayment::where('appointment_id', $request->appointment_id)->first();
        $test->increment('pay_amount', $request->pay_amount);
        $test->increment('total', $request->total);
        $due_amount = $test->total - $test->pay_amount;
        $test->update(['due_amount' => $due_amount]);
          
          return redirect()->route('addtestpayment.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $addtestpayment=AddTestPayment::find($id);
  
          $addtestpayment->delete();
          return redirect()->back();
      }
}
