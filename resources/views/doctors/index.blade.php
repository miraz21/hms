@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Doctor List </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('doctor.create') }}"> <i class="fa fa-plus"></i> Add Doctor </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	    </div>
	    <div class="card-body">
	    <div class="table-responsive">

	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
	              <th scope="col">Doctor Name</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Speciality</th>
                  <th scope="col">Room</th>
                  <th scope="col">Doctor Image</th>
			      <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Name</th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>
	          <tbody>
	           @foreach($doctors as $key=>$doctor)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$doctor->name}}</td>
		      <td>{{$doctor->phone}}</td>
		      <td>{{$doctor->speciality}}</td>
              <td>{{$doctor->room}}</td> 
			  <td>
      	      <img src="{{asset('upload/doctors/'.$doctor->image)}}" alt="image" width="100">
              </td> 
		      <td>
		      	<a href="{{route('doctor.edit', $doctor->id)}}" class="btn btn-primary">Edit</a>
		      	<!-- <a href="{{route('doctor.delete', $doctor->id)}}" class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$doctors->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection