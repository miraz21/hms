<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use Illuminate\Support\Facades\Auth;

use App\Models\OnlineAppointment;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
  public function addview()
  {
      return view('admin.add_doctor');
  }
  public function upload(Request $request)
  {
    $doctor= new doctor;
    $image= $request->file;
    $imagename=time(). '.' .$image->getClientOriginalExtension();
    $request->file->move('doctorimage', $imagename);
    $doctor->image= $imagename;
    $doctor->name= $request->name;
    $doctor->phone= $request->phone;  
    $doctor->room= $request->room;
    $doctor->speciality= $request->speciality;

    $doctor->save();

    return redirect()->back()->with('message','Doctor Added Successfully');
  }
  public function showappointment()
  {
    if(Auth::id())
    {
      if(Auth::user()->usertype==1)
      {
        $data= OnlineAppointment::all();
        return view('admin.showappointment', compact('data'));
      }
      if(Auth::user()->usertype==5)
      {
        $data= OnlineAppointment::all();
        return view('admin.showappointment', compact('data'));
      }
      else{
        return redirect()->back();
      }
    }
    else{
      return redirect('login');
    }
  }
  public function approved($id)
{
  $data=OnlineAppointment::find($id);
  $data->status='approved';
  $data->save();
  return redirect()->back();
}

public function canceled($id)
{
  $data=OnlineAppointment::find($id);
  $data->status='canceled';
  $data->save();
  return redirect()->back();
}
// public function emailview($id)
// {
//   $data=OnlineAppointment::find($id);
//   return view('admin.email_view', compact('data'));
// }
// public function sendemail(Request $request, $id)
// {
//   $data=OnlineAppointment::find($id);
//   $details=[
//     'greeting'=>$request->greeting,
//     'body'=>$request->body,
//     'actiontext'=>$request->actiontext,
//     'actionurl'=>$request->actionurl,
//     'endpart'=>$request->endpart
//   ];
//   Notification::send($data, new SendEmailNotification($details));

//   return redirect()->back()->with('message', 'Email send is successful');
// }
}

