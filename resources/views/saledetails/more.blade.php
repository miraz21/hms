@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Sale Details </h2>		
		</div>
		<div class="col-md-6 text-right">
			{{-- <a class="btn btn-info" href="{{ route('saledetail.create') }}"> <i class="fa fa-plus"></i> Add Sale </a> --}}
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
	              <th scope="col">Medicine Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Amount</th>
			      <th scope="col">Date</th>
			      <th scope="col">Action</th>
	            </tr>
	          </thead>
			  
	          <tbody>
	           @foreach($saledetails as $key=>$saledetail)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
			  <td>{{$saledetail->appointment->appoint_name}}</td>
		      <td>{{$saledetail->medicinedetail->medicinename->name}}</td>
		      <td>{{number_format($saledetail->price, 2)}}</td>
		      <td>{{number_format($saledetail->quantity)}}</td>
		      <td>{{number_format($saledetail->amount)}}</td>
		      <td>{{$saledetail->date}}</td> 
		      <td>
		      	{{-- <a href="{{route('saledetail.edit', $saledetail->id)}}"class="btn btn-sm btn-primary">Edit</a> --}}
				<a href="{{route('print.sale',$saledetail->appointment_id)}}" class="btn btn-sm btn-info">Print</a>
		      	<!-- <a href="{{route('saledetail.delete', $saledetail->id)}}"class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
			  <tfoot>
	            <tr>
	              <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
	              <th>Total: {{$saledetails->sum('amount')}}</th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>
	        </table>
			{{$saledetails->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection