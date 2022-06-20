<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MedicineCompany;

class MedicineCompanyController extends Controller
{
    public function index()
  {
    $medicinecompanies=MedicineCompany::orderBy('id','desc')->paginate(10);
    return view('medicinecompany.index', compact('medicinecompanies'));
  }
    public function create()
    {
        $medicinecompany=MedicineCompany::all();
        return view('medicinecompany.create');
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'title'=>'required',
         ]);

         $data=[
        'title'=>$request->input('title'),
        ];

        MedicineCompany::create($data);
        
        return redirect()->route('medicinecompany.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $medicinecompany=MedicineCompany::find($id);

        $medicinecompany->delete();
        return redirect()->back();
    }
}
