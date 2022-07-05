<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BuyMedicine;

use App\Models\MedicineDetail;

use Illuminate\Support\Facades\Auth;

class BuyMedicineController extends Controller
{
    public function index()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      $buymedicines=BuyMedicine::orderBy('id','desc')->paginate(10);
      return view('buy_medicine.index', compact('buymedicines'));
    }
    if(Auth::user()->usertype==3)
    {
      $buymedicines=BuyMedicine::orderBy('id','desc')->paginate(10);
      return view('buy_medicine.index', compact('buymedicines'));
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
          $medicinedetails=MedicineDetail::all();
          $buymedicine=BuyMedicine::all();
          return view('buy_medicine.create', compact('medicinedetails'));
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'medicinedetail_id'=>'required',
          'quantity'=>'required',
          'amount'=>'required',
        //   'date'=>'required',
           ]);
  
           $data=[
          'medicinedetail_id'=>$request->input('medicinedetail_id'),
          'quantity'=>$request->input('quantity'),
          'amount'=>$request->input('amount'),
        //   'date'=>$request->input('date'),
          ];
  
          BuyMedicine::create($data);
          MedicineDetail::where('id',$request->medicinedetail_id)->increment('quantity', $request->quantity);
          
          return redirect()->route('buymedicine.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $buymedicine=BuyMedicine::find($id);
  
          $buymedicine->delete();
          return redirect()->back();
      }
}
