<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

use App\Models\Customer;

 use App\Models\Sale;

 use App\Models\SaleItem;

use App\Models\AddCustomerBalance;

use Illuminate\Support\Facades\Auth;

class AddCustomerBalanceController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
      if(Auth::user()->usertype==1)
      {
      $addcustomerbalances=AddCustomerBalance::orderBy('id','desc')->paginate(10);
      return view('addcustomerbalance.index', compact('addcustomerbalances'));
    }
    if(Auth::user()->usertype==3)
    {
    $addcustomerbalances=AddCustomerBalance::orderBy('id','desc')->paginate(10);
    return view('addcustomerbalance.index', compact('addcustomerbalances'));
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
          $addcustomerbalances=AddCustomerBalance::all();
          return view('addcustomerbalance.create', compact('appointment'));
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'appointment_id'=>'required',
          'sale_id'=>'required',
          'pay_amount'=>'required',
          // 'date'=>'required',
           ]);
  
           $data=[
          'appointment_id'=>$request->input('appointment_id'),
          'sale_id'=>$request->input('sale_id'),
          'pay_amount'=>$request->input('pay_amount'),
          // 'date'=>$request->input('date'),
          ];
  
          // AddCustomerBalance::create($data);
          // Customer::where('id',$request->customer_id)->increment(['pay_amount', $request->pay_amount]);

         $cus = Customer::where('appointment_id', $request->appointment_id)->first();
         $cus->increment('pay_amount', $request->pay_amount);
        $cus->increment('total', $request->total);
        $due_amount = $cus->total - $cus->pay_amount;
        $cus->update(['due_amount' => $due_amount]);
          
          return redirect()->route('addcustomerbalance.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $addcustomerbalance=AddCustomerBalance::find($id);
  
          $addcustomerbalance->delete();
          return redirect()->back();
      }
}
