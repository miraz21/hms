@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Sales Man  </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('saleman.create') }}"> <i class="fa fa-plus"></i> Add Saleman </a>
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
	              <th>Saleman Name</th>
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
	          	@foreach($salemans as $saleman)
		            <tr>
		              <td> {{ $saleman->id }} </td>
		              <td> {{ $saleman->name }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('saleman.delete', $saleman->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$salemans->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection