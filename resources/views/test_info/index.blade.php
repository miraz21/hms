@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Test Document </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('testinfo.store') }}"> <i class="fa fa-plus"></i> Add Test Information </a>
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
	              <th>Test</th>
				  <th>Price</th>
				  {{-- <th>Discount</th> --}}
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
	          	@foreach($testinfos as $testinfo)
		            <tr>
		              <td> {{ $testinfo->id }} </td>
		              <td> {{ $testinfo->test }} </td>
					  <td> {{ $testinfo->price }} </td>
					  {{-- <td> {{ $testinfo->discount }} </td> --}}
		              <td class="text-right">
		             <!-- <a class="btn btn-danger" href="{{route('testinfo.delete', $testinfo->id)}}">Delete</a> -->
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
			{{$testinfos->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection