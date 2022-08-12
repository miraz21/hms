<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

use App\Models\PathologicalTest;

use App\Models\PathologicalTestPayment;

use App\Models\PatientMoreInFo;

use App\Models\TestInfo;

class PrintTestReportController extends Controller
{
    public function index()
    {
          $pathologicaltests = PathologicalTest::all();
          return view('pathological_test.printtestreport')->with('pathologicaltests', $pathologicaltests);;
    }
    public function prnpriview($id,$app_id)
    {
      $pathologicaltestpayment=PathologicalTestPayment::where('appointment_id',$app_id)->first();
      $pathologicaltests = PatientMoreInFo::where('appointment_id',$app_id)->get();
      $pathologicalpatient = PatientMoreInFo::where('appointment_id',$app_id)->first();
      $tId = PatientMoreInFo::where('appointment_id',$app_id)->pluck('test_info_id')->toArray();
      $test_amount = TestInfo::whereIn('id',$tId)->sum('price');
      //     return $pathologicaltests = PathologicalTest::find($id)->testinfo->get();
          return view('pathological_test.testreport',compact('pathologicaltests','pathologicalpatient','test_amount','pathologicaltestpayment'));
    }
}
