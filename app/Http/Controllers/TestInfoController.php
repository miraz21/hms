<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestInfo;

use Illuminate\Support\Facades\Auth;

class TestInfoController extends Controller
{
    public function index()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      $testinfos=TestInfo::orderBy('id','desc')->paginate(10);
      return view('test_info.index', compact('testinfos'));
    }
    if(Auth::user()->usertype==4)
    {
      $testinfos=TestInfo::orderBy('id','desc')->paginate(10);
      return view('test_info.index', compact('testinfos'));
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
          $testinfo=TestInfo::all();
          return view('test_info.create');
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'test'=>'required',
          'price'=>'required',
        //   'discount'=>'required',
           ]);
  
           $data=[
          'test'=>$request->input('test'),
          'price'=>$request->input('price'),
        //   'discount'=>$request->input('discount'),
          ];
  
          TestInfo::create($data);
          
          return redirect()->route('testinfo.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }
          public function delete($id)
      {
          $testinfo=TestInfo::find($id);
  
          $testinfo->delete();
          return redirect()->back();
      }
}
