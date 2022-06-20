@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		<h2> Patients List </h2>		
		</div>
		<div class="col-md-6 text-right">
	    <a class="btn btn-info" href="{{ route('patientpayment.create') }}"> <i class="fa fa-plus"></i> Add Payment </a>
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
			      <th scope="col">Total</th>
				  <th scope="col">Payment</th>
				  <!-- <th scope="col">Due</th> -->
				  <th scope="col">Date</th>
			      <!-- <th scope="col">Action</th> -->
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
	           @foreach($patientpayments as $key=>$patientpayment)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$patientpayment->appointment->appoint_name}}</td>
		      <td>{{$patientpayment->appointment->phone}}</td>
		      <td>{{number_format($patientpayment->total)}}</td>
			  <td>{{number_format($patientpayment->pay_amount)}}</td>
			  <!-- <td>{{ number_format(($patientpayment->total - $patientpayment->pay_amount)) }}</td> -->
		      <td>{{$patientpayment->date}}</td> 
		      <td>
		      	<!-- <a href="" class="btn btn-primary">Edit</a>
		      	<a href="" class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$patientpayments->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection