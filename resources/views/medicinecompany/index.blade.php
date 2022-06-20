@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Medicine Company </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('medicinecompany.create') }}"> <i class="fa fa-plus"></i> New Medicine Company </a>
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
	              <th>Company</th>
	              <!-- <th class="text-right">Actions</th> -->
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Title</th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach($medicinecompanies as $medicinecompany)
		            <tr>
		              <td> {{ $medicinecompany->id }} </td>
		              <td> {{ $medicinecompany->title }} </td>
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('medicinecompany.delete', $medicinecompany->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$medicinecompanies->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection