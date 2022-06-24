<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use App\Models\Sale;
use App\Models\TestInfo;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PatientReportController extends Controller
{
    public function index()
    {
        return view('patientreport.index');
    }

    public function view()
    {

        $p_lists = Appointment::orderBy('appoint_name', 'asc')->get();
        return view('patientreport.patientlist', compact('p_lists'));
    }



    public function report(Request $request)
    {
        // dd($request->all());
        $appointment = Appointment::where('id',$request->id)->first();
        $tests = $appointment->pathologicaltests()->with('testinfo')->get();
        $tesinfoID = $appointment->pathologicaltests()->pluck('test_info_id')->toArray();

        $subtotal = TestInfo::whereIn('id',$tesinfoID)->sum('price');
        $discount = $tests->sum('discount');

        $test_total = $subtotal - $discount;

        //medicine
        $medicines = $appointment->saledetails()->with('medicinedetail.medicinename')->get();
        // return $medicines->sum('amount');

        $pathologcal_pay = $appointment->pathologicaltestpayments()->get();
        $pathological_t_total = $pathologcal_pay->sum('total');

        $patient = $appointment->patients()->select('total','pay_amount','due_amount')->get();
        $patient_total = $patient->sum('total');

        $pharmecy =  $appointment->customers()->select('total','pay_amount','due_amount')->get();
        $pharmecy_total = $pharmecy->sum('total');


        $grand_total = $pathological_t_total + $patient_total + $pharmecy_total;
        $total_pay = $pathologcal_pay->sum('pay_amount') + $patient->sum('pay_amount') + $pharmecy->sum('pay_amount');
        $due_amount = $pathologcal_pay->sum('due_amount') + $patient->sum('due_amount') + $pharmecy->sum('due_amount');

        // return $total_pay;



        // return $tests;

       $ap =  Appointment::where('id',$request->id)->select('appoint_name','phone','date')->first();

        $sales = Sale::query()->where('appointment_id', $request->id)->get();

        return view('patientreport.index',compact('ap','tests','test_total','medicines','grand_total','total_pay','due_amount', 'sales'));
    }
}
