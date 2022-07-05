@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Payment Document </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('customer.create') }}"> <i class="fa fa-plus"></i> Add Customer Payment </a>
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
	              <th>Customer Name</th>
				  <th>Phone</th>
				  <th>Sale Document</th>
				  <th>SubTotal</th>
				  <th>Discount</th>
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
	          	@foreach($customers as $customer)
		            <tr>
		              <td> {{ $customer->id }} </td>
		              <td> {{ $customer->appointment->appoint_name }} </td>
					  <td> {{ $customer->appointment->phone }} </td>
					  <td> {{ $customer->sale->invoice_no }} </td>
					  <td> {{ $customer->sale->total }} </td>
					  <td> {{ $customer->discount }} </td>
					  <td> {{ ($customer->sale->total) - ($customer->discount) }} </td>
                      <td> {{ $customer->pay_amount }} </td>
                      <td> {{ $customer->due_amount }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('customer.delete', $customer->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$customers->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection