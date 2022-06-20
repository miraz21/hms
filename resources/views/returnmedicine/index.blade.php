@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Add Return Medicine </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('returnmedicine.create') }}"> <i class="fa fa-plus"></i> Add Return Medicine </a>
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
                  <th scope="col">Patient Name</th>
	              <th scope="col">Medicine Name</th>
			      <th scope="col">Quantity</th>
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
	           @foreach($returnmedicines->unique('appointment_id') as $key=>$returnmedicine)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
              <td>{{$returnmedicine->appointment->appoint_name}}</td>
		      <td>{{$returnmedicine->medicinedetail->medicinename->name}}</td>
		      <td>{{number_format($returnmedicine->quantity)}}</td>
		      <td>{{$returnmedicine->date}}</td> 
		      <td>
		      	{{-- <a href="" class="btn btn-primary">Edit</a> --}}
		      	<!-- <a href="{{route('returnmedicine.delete', $returnmedicine->id)}}" class="btn btn-warning">Delete</a> -->
				  <a class="btn btn-sm btn-info" href="{{ route('returnmedicine.show',$returnmedicine->appointment_id) }}">More info</a> 
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$returnmedicines->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection