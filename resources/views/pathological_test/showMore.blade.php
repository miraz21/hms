@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		<h2> Test List </h2>		
		</div>
		<div class="col-md-6 text-right">
	  
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	     <h6>Patient Name: <span style="color: green;">{{$pathologicalpatient->moreinfo->appoint_name}}</span> </h6>
		 <h6>Patient Age: <span style="color: green;">{{$pathologicalpatient->moreinfo->age}}</span> </h6>
		 <h6>Patient Phone: <span style="color: green;">{{$pathologicalpatient->moreinfo->phone}}</span> </h6>
	    <div class="card-body">
	    <div class="table-responsive">

	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
			      <th scope="col">Test & price</th>
				  <th scope="col">Discount</th>
				  <th scope="col">Date</th>
	            </tr>
	          </thead>
	          <tbody>
			  @foreach($pathologicaltests as $key=>$pathologicaltest)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$pathologicaltest->testinfo->test}} --- {{$pathologicaltest->testinfo->price}}</td>
		      <td>{{$pathologicaltest->discount}}</td> 
              <td>{{ \Carbon\Carbon::parse($pathologicaltest->created_at)->format('d-m-Y') }}</td>
		    </tr>

			
            @endforeach
		
	     </tbody>

			<tfoot>
	        <tr>
	        <th></th>
	        <th>Total:{{ $test_amount }} </th>
	        <th class="text-right"></th>
	       </tr>
	    </tfoot>
		
	    </table>
	    </div>
	    </div>
	  </div>
	  @endsection