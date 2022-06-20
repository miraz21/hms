@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Patient Test Payment  </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('addtestpayment.create') }}"> <i class="fa fa-plus"></i> Add Test Payment </a>
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
                  <th>Total</th>
                  <th>Payment</th>
                  <!-- <th>Due</th> -->
				  <th>Date</th>
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
	          	@foreach($addtestpayments as $addtestpayment)
		            <tr>
					<td> {{ $addtestpayment->id }} </td>
		              <td> {{ $addtestpayment->appointment->appoint_name }} </td>
                      <td> {{ number_format($addtestpayment->total) }} </td>
                      <td> {{ number_format($addtestpayment->pay_amount) }} </td>
                      <!-- <td> {{ number_format(($addtestpayment->total - $addtestpayment->pay_amount) ) }} </td> -->
					  <td>{{$addtestpayment->date}}</td> 
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('addtestpayment.delete', $addtestpayment->id)}}">Delete</a> -->
		              </td> 
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$addtestpayments->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection