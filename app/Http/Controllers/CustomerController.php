<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use App\Models\SaleDetail;

use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
     if(Auth::id())
     {
    if(Auth::user()->usertype==1)
    {
      $customers=Customer::orderBy('id','desc')->paginate(10);
      return view('customers.index', compact('customers'));
    }
    if(Auth::user()->usertype==3)
    {
      $customers=Customer::orderBy('id','desc')->paginate(10);
      return view('customers.index', compact('customers'));
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
          $saledetails=SaleDetail::all();
          $customer=Customer::all();
          return view('customers.create', compact('saledetails','appointment'));
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
  
          Customer::create($data);
          
          return redirect()->route('customer.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $customer=Customer::find($id);
  
          $customer->delete();
          return redirect()->back();
      }
}
