<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HsCost;

use Illuminate\Support\Facades\Auth;

class HsCostController extends Controller
{
    public function index()
    {
     if(Auth::id())
     {
    if(Auth::user()->usertype==1)
    {
      $hscosts=HsCost::orderBy('id','desc')->paginate(10);
      return view('hs_cost.index', compact('hscosts'));
    }
    if(Auth::user()->usertype==4)
    {
      $hscosts=HsCost::orderBy('id','desc')->paginate(10);
      return view('hs_cost.index', compact('hscosts'));
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
          $hscost=HsCost::all();
          return view('hs_cost.create');
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'name'=>'required',
          'reason'=>'required',
          'amount'=>'required',
        //   'date'=>'required',
           ]);
  
           $data=[
          'name'=>$request->input('name'),
          'reason'=>$request->input('reason'),
          'amount'=>$request->input('amount'),
        //   'date'=>$request->input('date'),
          ];
  
          HsCost::create($data);
          
          return redirect()->route('hscost.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $hscost=HsCost::find($id);
  
          $hscost->delete();
          return redirect()->back();
      }
}
