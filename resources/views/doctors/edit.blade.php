@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Doctor Document</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('doctor.edit',$doctor->id)}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <label for="name" class="form-label">Doctor Name</label>
    <input type="text" name="name" class="form-control" id="name"  value="{{$doctor->name}}">
    </div>
    <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control" id="phone" value="{{$doctor->phone}}">
  </div>
  <div class="mb-3">
  <select name="speciality" id="speciality"  class="custom-select" value="{{$doctor->speciality}}">
    <option>---Select Speciality---</option>
    <option value="Cardiologist">Cardiologist</option>
    <option value="Cardiologist">Cardiologist</option>
    <option value="Cardiologist">Cardiologist</option>
 </select>
  </div>
   <div class="mb-3">
    <label for="room" class="form-label">Room</label>
    <input type="number" name="room" class="form-control" id="room" value="{{$doctor->room}}">
  </div>
     <div class="mb-3">
    <label for="image" class="form-label">Doctor Image</label>
    <input type="file" name="image" class="form-control" id="image" >
    <img src="{{asset('upload/doctors/'.$doctor->image)}}" alt="image" width="100">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection