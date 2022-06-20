<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
    	$doctors=Doctor::orderBy('id','desc')->paginate(10);
    	return view('doctors.index', compact('doctors'));
    }
    if(Auth::user()->usertype==2)
    {
    $doctors=Doctor::orderBy('id','desc')->paginate(10);
    return view('doctors.index', compact('doctors'));
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
    	return view('doctors.create');
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'speciality'=>'required',
        'room'=>'required',
        'image'=>'required',
         ]);

        $image=$request->file('image');
        $newName='doctor'.time(). '.' . $image->getClientOriginalExtension();
        $request->image->move('upload/doctors',$newName);

         $data=[
        'name'=>$request->input('name'),
        'phone'=>$request->input('phone'),
        'speciality'=>$request->input('speciality'),
        'room'=>$request->input('room'),
        'image'=>$newName,
        ];

        Doctor::create($data);
        
        return redirect()->route('doctor.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
    	$doctor=Doctor::find($id);
    	return view('doctors.edit', compact('doctor'));
    }
    public function update(Request $request, $id)
    {
        try{
         $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'speciality'=>'required',
        'room'=>'required',
         ]);

        $doctor=Doctor::find($id);
        $image=$request->file('image');
        if($image){
            if(file_exists('upload/doctors/'.$doctor->image)){
                unlink('upload/doctors/'.$doctor->image);
            }
       
        $newName='doctor'.time(). '.' . $image->getclientoriginalExtension();
        $request->image->move('upload/doctors',$newName);
        $doctor->update(['image'=>$newName]);
        }

        $data=[
        'name'=>$request->input('name'),
        'phone'=>$request->input('phone'),
        'speciality'=>$request->input('speciality'),
        'room'=>$request->input('room'),
        ];

         $doctor->update($data);
        return redirect()->route('doctor.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
    	$doctor=Doctor::find($id);
        if(file_exists('upload/doctors/'. $doctor->image)){
            unlink('upload/doctors/' . $doctor->image);
        }

    	$doctor->delete();
    	return redirect()->back();
    }
}
