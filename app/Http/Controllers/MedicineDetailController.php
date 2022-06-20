<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\MedicineCompany;

use App\Models\MedicineName;

use App\Models\MedicineDetail;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class MedicineDetailController extends Controller

    {
     public function index()
    {
        if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
        $medicinedetails=MedicineDetail::orderBy('id','desc')->paginate(10);
        return view('medicinedetails.index',compact('medicinedetails'));
        }
        if(Auth::user()->usertype==3)
        {
        $medicinedetails=MedicineDetail::orderBy('id','desc')->paginate(10);
        return view('medicinedetails.index',compact('medicinedetails'));
        }
    else
    {
        return redirect()->back();
    }
    }
    else
    {
        return redirect('login');
    }
}
    
    

    public function create()
    {
        // $medicinecompany=MedicineCompany::all();
        $medicinename=MedicineName::all();
        return view('medicinedetails.create', compact('medicinename'));
    }

    public function search(Request $request)
    {
        $medicinedetail=MedicineName::with('medicinedetail')->where('name','like','%'. $request->input('query').'%')->get();
        return view('search', compact('medicinedetail'));
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        // 'medicinecompany_id'=>'required', 
        'medicinename_id'=>'required',
        'price'=>'required',
        // 'discount'=>'required',
        'quantity'=>'required',
         ]);


         $data=[
        // 'medicinecompany_id'=>$request->input('medicinecompany_id'),
        'medicinename_id'=>$request->input('medicinename_id'),
        'price'=>$request->input('price'),
        // 'discount'=>$request->input('discount'),
        'quantity'=>$request->input('quantity'),
        ];

        MedicineDetail::create($data);
        
        return redirect()->route('medicinedetail.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
        $medicinedetail=MedicineDetail::find($id);
        return view('medicinedetails.edit', compact('medicinedetail'));
    }
    public function update(Request $request, $id)
    {

        try{
         $request->validate([
        //'medicinecompany_id'=>'required', 
        //'medicinename_id'=>'required',
        'price'=>'required',
        // 'discount'=>'required',
        'quantity'=>'required',
         ]);

        $data=[
        //'medicinecompany_id'=>$request->input('medicinecompany_id'),
        //'medicinename_id'=>$request->input('medicinename_id'),
        'price'=>$request->input('price'),
        // 'discount'=>$request->input('discount'),
        'quantity'=>$request->input('quantity'),
        ];

        $medicinedetail = MedicineDetail::find($id);
        $medicinedetail ->update($data);
        return redirect()->route('medicinedetail.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
        $medicinedetail=MedicineDetail::find($id);

        $medicinedetail->delete();
        return redirect()->back();
    }
}
