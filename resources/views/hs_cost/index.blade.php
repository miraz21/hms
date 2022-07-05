@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Costing List </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('hscost.create') }}"> <i class="fa fa-plus"></i> Add Hospital Costing  </a>
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
	              <th>Name</th>
                  <th>Reason</th>
                  <th>Amount</th>
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
	          	@foreach($hscosts as $hscost)
		            <tr>
		              <td> {{ $hscost->id }} </td>
		              <td> {{ $hscost->name }} </td>
                      <td> {{ $hscost->reason }} </td>
                      <td> {{ $hscost->amount }} </td>
                      <td> {{ \Carbon\Carbon::parse($hscost->created_at)->format('d-m-Y') }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('hscost.delete', $hscost->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$hscosts->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection