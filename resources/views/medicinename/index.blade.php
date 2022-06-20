@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Medicine Name </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('medicinename.create') }}"> <i class="fa fa-plus"></i> New Medicine Name </a>
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
	              <th>Medicine Name</th>
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
	          	@foreach($medicinenames as $medicinename)
		            <tr>
		              <td> {{ $medicinename->id }} </td>
		              <td> {{ $medicinename->name }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('medicinename.delete', $medicinename->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$medicinenames->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection