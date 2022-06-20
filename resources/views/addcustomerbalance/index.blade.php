@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Customer Payment Document </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('addcustomerbalance.create') }}"> <i class="fa fa-plus"></i> Add Customer Payment </a>
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
	          	@foreach($addcustomerbalances as $addcustomerbalance)
		            <tr>
					<td> {{ $addcustomerbalance->id }} </td>
		              <td> {{ $addcustomerbalance->appointment->appoint_name }} </td>
                      <td> {{ number_format($addcustomerbalance->total) }} </td>
                      <td> {{ number_format($addcustomerbalance->pay_amount) }} </td>
                      <!-- <td> {{ number_format(($addcustomerbalance->total - $addcustomerbalance->pay_amount) ) }} </td> -->
					  <td>{{$addcustomerbalance->date}}</td> 
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('addcustomerbalance.delete', $addcustomerbalance->id)}}">Delete</a> -->
		              </td> 
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$addcustomerbalances->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection