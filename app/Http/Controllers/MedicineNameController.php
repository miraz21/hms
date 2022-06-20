<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MedicineName;

use Illuminate\Support\Facades\Auth;

class MedicineNameController extends Controller
{
    public function index()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      $medicinenames=MedicineName::orderBy('id','desc')->paginate(10);
      return view('medicinename.index', compact('medicinenames'));
    }
    if(Auth::user()->usertype==3)
    {
      $medicinenames=MedicineName::orderBy('id','desc')->paginate(10);
      return view('medicinename.index', compact('medicinenames'));
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
          $medicinename=MedicineName::all();
          return view('medicinename.create');
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'name'=>'required',
           ]);
  
           $data=[
          'name'=>$request->input('name'),
          ];
  
          MedicineName::create($data);
          
          return redirect()->route('medicinename.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $medicinename=medicinename::find($id);
  
          $medicinename->delete();
          return redirect()->back();
      }
}
