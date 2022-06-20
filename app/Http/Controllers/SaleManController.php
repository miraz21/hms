<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaleMan;

use Illuminate\Support\Facades\Auth;

class SaleManController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
      if(Auth::user()->usertype==1)
      {
      $salemans=SaleMan::orderBy('id','desc')->paginate(10);
      return view('saleman.index', compact('salemans'));
    }
    if(Auth::user()->usertype==3)
    {
    $salemans=SaleMan::orderBy('id','desc')->paginate(10);
    return view('saleman.index', compact('salemans'));
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
          $saleman=SaleMan::all();
          return view('saleman.create');
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
  
          SaleMan::create($data);
          
          return redirect()->route('saleman.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $saleman=SaleMan::find($id);
  
          $saleman->delete();
          return redirect()->back();
      }
}
