@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Medicine List </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('medicinedetail.create') }}"> <i class="fa fa-plus"></i> Add Medicine</a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
		  <form action="/search" class="navbar-form navbar-left">
		  <div class="form-group">
		  <input type="text" name="query" class="form-control search-box" placeholder="search">
		  <button type="submit" class="btn btn-default">Search</button>
          </div>
          </form>
	    </div>
	    <div class="card-body">
	    <div class="table-responsive">



	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
	              <!-- <th scope="col">Medicine Company</th> -->
			      <th scope="col">Medicine Name</th>
			      <th scope="col">Price</th>
			      {{-- <th scope="col">Discount</th> --}}
			      <th scope="col">Quantity</th>
			      <th scope="col">Action</th>
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
	           @foreach($medicinedetails as $key=>$medicinedetail)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$medicinedetail->medicinename->name}}</td>
		      <td>{{number_format($medicinedetail->price, 2)}}</td>
		      {{-- <td>{{number_format($medicinedetail->discount, 2)}}</td> --}}
		      <td>{{number_format($medicinedetail->quantity)}}</td> 
		      <td>
		      <a href="{{route('medicinedetail.edit', $medicinedetail->id)}}"class="btn btn-primary">Edit</a>
		      	<!-- <a href="{{route('medicinedetail.delete', $medicinedetail->id)}}"class="btn btn-warning">Delete</a> -->
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$medicinedetails->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection