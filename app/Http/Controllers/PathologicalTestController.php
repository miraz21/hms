<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

use App\Models\PathologicalTest;

use App\Models\PatientMoreInFo;

use App\Models\TestInfo;

use Illuminate\Support\Facades\Auth;

use Illuminate\Console\Application;

use Illuminate\Support\Arr;

class PathologicalTestController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
        $pathologicaltests = PatientMoreInFo::orderBy('id', 'desc')->paginate(10);

        return view('pathological_test.index', compact('pathologicaltests'));
    }
    if(Auth::user()->usertype==4)
    {
    $pathologicaltests = PatientMoreInFo::orderBy('id', 'desc')->paginate(10);

    return view('pathological_test.index', compact('pathologicaltests'));
    }
    else{
        return redirect()->back();
    }
    }else{
    return redirect('login');
    }
    }

    public function showMOre($id, $appointemnt_id)
    {

        $pathologicaltests = PatientMoreInFo::where('appointment_id', $appointemnt_id)->get();

        $tId = PatientMoreInFo::where('appointment_id', $appointemnt_id)->pluck('test_info_id')->toArray();

        $test_amount = TestInfo::whereIn('id', $tId)->sum('price');

        $pathologicalpatient = PatientMoreInFo::where('appointment_id', $appointemnt_id)->first();

        return view('pathological_test.showMore', compact('pathologicaltests', 'pathologicalpatient', 'test_amount'));
    }


    public function create()
    {
        $appointment = Appointment::all();
        $testinfo = TestInfo::all();
        return view('pathological_test.create', compact('appointment', 'testinfo'));
    }

    // public function getData(Request $request){
    //     $app = Appointment::where('id',$request->id)->select('phone','age')->first();
    //    return response()->json($app);
    // //   dd($request->all());
    // }

    public function store(Request $request)
    {


        $c = count($request->test_info_id);
        for ($i = 0; $i < $c; $i++) {
            $old = new PatientMoreInFo();
            $old->appointment_id =  $request->appointment_id;
            $old->test_info_id =  $request->test_info_id[$i];
            $old->discount = $request->discount[$i];
            $old->date = $request->date;
            $old->save();
        }

        // return 'ookk';



        // dd($request->all());


        // $appointment_id = $request->appointment_id;



        // $user = Appointment::where('id', $appointment_id)->first();

        // $find_id = $user->id;

        // $pathological_user = PathologicalTest::where('appointment_id', $find_id)->first();

        // if ($pathological_user) {


        //     $c = count($request->test_info_id);

        //     $old = new PatientMoreInFo();
        //     for ($i = 0; $i < $c; $i++) {

        //         $old->appointment_id =  $request->appointment_id;
        //         $old->test_info_id =  $request->test_info_id[$i];
        //         $old->discount = $request->discount[$i];
        //         $old->date = $request->date;
        //     }
        //     $old->save();
        // } else {


        //     $c = count($request->test_info_id);

        //     $new = new PathologicalTest();
        //     for ($i = 0; $i < $c; $i++) {

        //         $new->appointment_id =  $request->appointment_id;
        //         $new->test_info_id =  $request->test_info_id[$i];
        //         $new->discount = $request->discount[$i];
        //         $new->date = $request->date;
        //     }
        //     $new->save();

        //     $c = count($request->test_info_id);

        //     $old = new PatientMoreInFo();
        //     for ($i = 0; $i < $c; $i++) {
        //         $old->pathological_id = $new->id;
        //         $old->appointment_id =  $request->appointment_id;
        //         $old->test_info_id =  $request->test_info_id[$i];
        //         $old->discount = $request->discount[$i];
        //         $old->date = $request->date;
        //     }
        //     $old->save();
        // }


        return redirect()->route('pathological.index');
    }

    public function delete($id)
    {
        $pathologicaltest = PatientMoreInFo::find($id);

        $pathologicaltest->delete();
        return redirect()->back();
    }
}
