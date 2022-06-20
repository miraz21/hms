@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Test Payment Document </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('pathologicaltestpayment.create') }}"> <i class="fa fa-plus"></i> Add Patient Payment </a>
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
	              <th>ID</th>
	              <th>Patient Name</th>
				  <th>Phone</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Due</th>
	              <!-- <th class="text-right">Actions</th> -->
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
	          	@foreach($pathologicaltestpayments as $pathologicaltestpayment)
		            <tr>
		              <td> {{ $pathologicaltestpayment->id }} </td>
		              <td> {{ $pathologicaltestpayment->appointment->appoint_name }} </td>
					  <td> {{ $pathologicaltestpayment->appointment->phone }} </td>
                      <td> {{ $pathologicaltestpayment->total }} </td>
                      <td> {{ $pathologicaltestpayment->pay_amount }} </td>
                      <td> {{ $pathologicaltestpayment->due_amount }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('pathologicaltestpayment.delete', $pathologicaltestpayment->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$pathologicaltestpayments->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection