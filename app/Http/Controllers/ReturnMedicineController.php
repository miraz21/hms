<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReturnMedicine;

use App\Models\Appointment;

use App\Models\MedicineDetail;

use App\Models\MedicineName;

use Illuminate\Support\Facades\Auth;

class ReturnMedicineController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
        $returnmedicines= ReturnMedicine::with(['medicinedetail.medicinename'])->orderBy('id','desc')->paginate(10);

        return view('returnmedicine.index', compact('returnmedicines'));
    }
    if(Auth::user()->usertype==3)
    {
    $returnmedicines= ReturnMedicine::with(['medicinedetail.medicinename'])->orderBy('id','desc')->paginate(10);

    return view('returnmedicine.index', compact('returnmedicines'));
    }
    else{
        return redirect()->back();
    }
    }
    else{
    return redirect('login');
    }
    }

    public function moreInfo($cus_id)
    {

        $returnmedicines = ReturnMedicine::with(['medicinedetail.medicinename'])->customerId($cus_id)->orderBy('id', 'desc')->get();

        $appointment = Appointment::where('id',$cus_id)->first();

        // return $returnmedicines;

        return view('returnmedicine.showMore', compact('returnmedicines','appointment'));
    }



    public function create()
    {
        $medicinedetails=MedicineDetail::with(['medicinename'])->get();
        $appointment=Appointment::all();
        $medicinenames=MedicineName::all();
        return view('returnmedicine.create',compact('medicinedetails','appointment','medicinenames'));
    }

    public function store(Request $request)
    {  

        // dd($request->all());

        try{
        $request->validate([
        'appointment_id'=>'required',
        // 'medicinedetail_id'=>'required',
        // 'quantity'=>'required',
        'date'=>'required',
         ]);

        //  $data=[
        // 'appointment_id'=>$request->input('appointment_id'),
        // 'medicinedetail_id'=>$request->input('medicinedetail_id'),
        // 'quantity'=>$request->input('quantity'),
        // 'date'=>$request->input('date'),
        // ];

        // foreach ($request->medicinedetail_id as $val) {
        // // ReturnMedicine::create($data);
        // $data = new MedicineDetail();
        // $data->appointment_id = $request->appointment_id;
        // $data->medicinedetail_id = $val['medicinedetail_id'];
        // $data->quantity = $val['quantity'];
        // $data->date = $request->date;
        // MedicineDetail::where('id',$val['medicinedetail_id'])->increment('quantity',$val['quantity']);
        // }

      
        for ($i = 0; $i < count($request->medicinedetail_id); $i++) {
            $data = [
                'appointment_id' => $request->appointment_id,
                'medicinedetail_id' => $request->medicinedetail_id[$i],
                // 'price' => $request->price[$i],
                'quantity' => $request->quantity[$i],
                'date' => $request->date,
            ];

           ReturnMedicine::create($data);
            // $id[] =  $created->id;

            MedicineDetail::where('id',$request->medicinedetail_id[$i])->increment('quantity', $request->quantity[$i]);
         
        }
        

        
        return redirect()->route('returnmedicine.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function delete($id)
    {
        $returnmedicine=ReturnMedicine::find($id);

        $returnmedicine->delete();
        return redirect()->back();
    }


}
