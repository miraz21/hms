@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		<h2> Return Medicine List </h2>		
		</div>
		<div class="col-md-6 text-right">
	  
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	     <h6>Patient Name: <span style="color: green;">{{$appointment->appoint_name}}</span> </h6>
	    <div class="card-body">
	    <div class="table-responsive">

	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
			      <th scope="col">Medicine Name</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Date</th>
	            </tr>
	          </thead>
	          <tbody>
			  @foreach($returnmedicines as $key=>$returnmedicine)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$returnmedicine->medicinedetail->medicinename->name}}</td>
		      <td>{{$returnmedicine->quantity}}</td> 
              <td>{{$returnmedicine->date}}</td>
		    </tr>

			
            @endforeach
		
	     </tbody>
		
	    </table>
	    </div>
	    </div>
	  </div>
	  @endsection