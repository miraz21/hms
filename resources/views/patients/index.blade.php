@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		<h2> Patients List </h2>		
		</div>
		<div class="col-md-6 text-right">
	    <a class="btn btn-info" href="{{ route('patient.create') }}"> <i class="fa fa-plus"></i> Admit Patient </a>
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
	              <th scope="col">Patient Name</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Room</th>
				  <th scope="col">Reason</th>
			      <th scope="col">Total</th>
				  <th scope="col">Payment</th>
				  <th scope="col">Due</th>
				  <th scope="col">Date</th>
			      {{-- <th scope="col">Action</th> --}}
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
	           @foreach($patients as $key=>$patient)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$patient->appointment->appoint_name}}</td>
		      <td>{{$patient->appointment->phone}}</td>
		      <td>{{$patient->room}}</td>
			  <td>{{$patient->reason}}</td>
		      <td>{{number_format($patient->total)}}</td>
			  <td>{{number_format($patient->pay_amount)}}</td>
			  <td>{{number_format($patient->due_amount)}}</td>
		      <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('d-m-Y') }}</td> 
		      <td>
		      	{{-- <a href="" class="btn btn-primary">Edit</a> --}}
		      	<!-- <a href="{{route('patient.delete', $patient->id)}}" class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$patients->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection