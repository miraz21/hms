<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\OnlineAppointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor= doctor::all();
                return view('user.home', compact('doctor'));
            }
            if(Auth::user()->usertype=='0')
            {
                $doctor= doctor::all();
                return view('user.home', compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
         return redirect('home');
        }
        else
        {
            $doctor= doctor::all();
            return view('user.home', compact('doctor'));
        }
       
    }
    public function appointment(Request $request)
    {
        $data= new OnlineAppointment;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->doctor= $request->doctor;
        $data->date= $request->date;
        $data->message= $request->message;
        $data->status= 'In Progress';
 
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }
       $data->save();
       return redirect()->back()->with('message','Appointment Request Successful. We will contact with you soon');
 
    }
     public function myappointment()
     {
         if(Auth::id())
         {
             if(Auth::user()->usertype==0)
             {
                 $userid= Auth::user()->id; 
                 $appoint= onlineappointment::where('user_id', $userid)->get();
                 return view ('user.my_appointment', compact('appoint'));
             }
         }
         else
         {
             return redirect()->back();
         }
         
     }
     public function cancel_appoint($id)
     {
         $data= onlineappointment::find($id);
         $data->delete();
         return redirect()->back();
     }
}
