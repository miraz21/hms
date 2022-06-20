<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use App\Models\Customer;

use App\Models\HsCost;

use App\Models\PathologicalTestPayment;

use Carbon\Carbon;

use Illuminate\Http\Request;

class HospitalReportController extends Controller
{
    public function index(Request $request)
    {

      // dd($request->all());

      $farmecy = Customer::whereDate('created_at',$request->date)->get();
      $pathologocal_testPay = PathologicalTestPayment::whereDate('created_at',$request->date)->get();
      $appointment = Appointment::whereDate('created_at',$request->date)->select('id','appointment_fee')->get();
      $hsCost = HsCost::whereDate('created_at',$request->date)->select('id','amount')->get();

      $search_date = Carbon::parse($request->date)->format('d-m-Y');
      // return  Carbon::parse($customer->created_at)->format('Y-m-d');
 
      // $time = Carbon::now()->format('Y-m-d');
      // return $farmecy;
      return view('hospitalreport.index',compact('farmecy','pathologocal_testPay','appointment','search_date','hsCost'));
    }
    public function dailylist()
    {
      return view('hospitalreport.hospitaldailylist');
    }



}
