@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Buy Medicine List </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('buymedicine.create') }}"> <i class="fa fa-plus"></i> Add Buy Medicine </a>
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
			      <th scope="col">Medicine Name</th>
			      <th scope="col">Quantity</th>
                  <th scope="col">Amount</th>
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
	           @foreach($buymedicines as $key=>$buymedicine)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$buymedicine->medicinedetails?$buymedicine->medicinedetails->medicinename->name:''}}</td>
		      <td>{{$buymedicine->quantity}}</td> 
              <td>{{number_format($buymedicine->amount)}}</td>
		      <td>{{ \Carbon\Carbon::parse($buymedicine->created_at)->format('d-m-Y') }}</td>
		      <td>
		      	<!-- <a href="{{route('buymedicine.delete', $buymedicine->id)}}"class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$buymedicines->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection