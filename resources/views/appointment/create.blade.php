@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Create Appointment</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('appointment.store')}}" method="post" enctype="multipart/form-data">
@csrf 
    <div class="mb-3">
    <label for="appoint_name" class="form-label">Appoint Name</label>
    <input type="text" name="appoint_name" class="form-control" id="appoint_name">
    </div>
    <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control" id="phone" >
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">AGE</label>
    <input type="number" name="age" class="form-control" id="age" >
  </div>
  <div class="mb-3">
    <label for="problem" class="form-label">Problem</label>
    <input type="text" name="problem" class="form-control" id="problem" >
  </div>
  <div class="mb-3">
  <select name="doctor" id="doctor"  class="custom-select">
    <option>---Select Doctor & speciality---</option>
    <option value="Dr. Sudhakar Sarker---Cardiologist">Dr. Sudhakar Sarker---Cardiologist</option>
    <option value="Dr. Khandakar Sahid Hosen---Cardiologist">Dr. Khandakar Sahid Hosen---Cardiologist</option>
    <option value="Dr. Ratan Kumar Dotto---Cardiologist">Dr. Ratan Kumar Dotto---Cardiologist</option>
 </select>
  </div>
   <div class="mb-3">
    <label for="room" class="form-label">Room</label>
    <input type="number" name="room" class="form-control" id="room">
  </div>
     <div class="mb-3">
    <label for="appointment_fee" class="form-label">Appointment Fee</label>
    <input type="number" name="appointment_fee" class="form-control" id="appointment_fee" >
  </div>
  {{-- <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount" >
  </div> --}}
  {{-- <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div> --}}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection