@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Appointment List </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('appointment.create') }}"> <i class="fa fa-plus"></i> Add Appointment </a>
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
	              <th scope="col">Patient</th>
			      <th scope="col">Phone</th>
			      <th scope="col">AGE</th>
			      <th scope="col">Problem</th>
			      <th scope="col">Doctor & speciality</th>
				  <th scope="col">Room</th>
                  <th scope="col">Fee</th>
				  {{-- <th scope="col">Discount</th> --}}
                  <th scope="col">Date</th>
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
	           @foreach($appointments as $key=>$appointment)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$appointment->appoint_name}}</td>
		      <td>{{$appointment->phone}}</td>
		      <td>{{$appointment->age}}</td>
		      <td>{{$appointment->problem}}</td>
		      <td>{{$appointment->doctor}}</td> 
              <td>{{$appointment->room}}</td> 
			 
			  {{-- @if ($appointment->discount==null)
			      $appointment->appointment_fee  
			  @else
			  <td>{{$appointment->appointment_fee - $appointment->discount }}</td>
			  @endif
			  
			  <td>{{$appointment->discount}}</td> --}}
			  
			  <td>{{$appointment->appointment_fee }}</td>
              <td>{{ \Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y') }}</td>
		      <td>
		      	<!-- <a href=""class="btn btn-primary">Edit</a> -->
			    <a href="{{route('print.appointment', $appointment->id)}}" class="btn btn-primary">Print</a>
		      	<!-- <a href="{{route('appointment.delete', $appointment->id)}}"class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$appointments->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection