@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		<h2> Pathological Test </h2>		
		</div>
		<div class="col-md-6 text-right">
	    <a class="btn btn-info" href="{{ route('pathological.create') }}"> <i class="fa fa-plus"></i> Add Pathological Test </a>
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
			      <th scope="col">Phone</th>
			      <th scope="col">AGE</th>
			      <th scope="col">Test & price</th>
				  <th scope="col">Discount</th>
				  <th scope="col">Date</th>
				  <th scope="col">More info</th>
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
			  @foreach($pathologicaltests->unique('appointment_id') as $key=>$pathologicaltest)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$pathologicaltest->appointment['appoint_name']}}</td>
		      <td>{{$pathologicaltest->appointment->phone}}</td>
		      <td>{{$pathologicaltest->appointment->age}}</td>
		      <td>{{$pathologicaltest->testinfo->test}} --- {{$pathologicaltest->testinfo->price}}</td>
		      <td>{{$pathologicaltest->discount}}</td> 
              <td>{{$pathologicaltest->date}}</td>
		      <td>
		      <a class="btn btn-sm btn-info" href="{{url('pathologicals/more',['id'=>$pathologicaltest->id,'appoint_id'=>$pathologicaltest->appointment->id])}}">More info</a> 
			  <a class="btn btn-sm btn-primary" href="{{url('test_prnpriview',['id'=>$pathologicaltest->id,'appoint_id'=>$pathologicaltest->appointment->id])}}">Print</a>   
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
			
	        </table>
		
	      </div>
	    </div>
	  </div>
	  @endsection