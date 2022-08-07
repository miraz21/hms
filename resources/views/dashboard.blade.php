<x-app-layout>
 
</x-app-layout>

	   	{{-- <form action="" class="col-4">
		<div class="form-group">
		<input type="search" name="search" id="search" class="form-control" placeholder="Search by name" value="{{$search}}">
        </div>
		<button class="btn btn-primary">Search</button>
		<a href="{{route('medicinedetail.index')}}">
		<button class="btn btn-primary" type="button">Reset</button>
       </a>
       </form>

	   <form action="{{ route('web.find') }}" method="GET">
        
		<div class="form-group">
		   <label for="">Enter keyword</label>
		   <input type="text" class="form-control" name="query" placeholder="Search here....." value="{{ request()->input('query') }}">
		   <span class="text-danger">@error('query'){{ $message }} @enderror</span>
		</div>
		<div class="form-group">
		 <button type="submit" class="btn btn-primary">Search</button>
		</div>
	 </form>
	 <br>
	 <br>
	 <hr>
	 <br>
	 @if(isset($countries))

	   <table class="table table-hover">
		   <thead>
			   <tr>
				   <th>Medicine Name</th>
				   <th>Quantity</th>
			   </tr>
		   </thead>
		   <tbody>
			   @if(count($medicine_details) > 0)
				   @foreach($medicinedetails as $medicinedetail)
					  <tr>
						  <td>{{ $medicinedetail->medicineName->name }}</td>
						  <td>{{ $medicinedetail->quantity }}</td>
					  </tr>
				   @endforeach
			   @else

				  <tr><td>No result found!</td></tr>
			   @endif
		   </tbody>
	   </table>

	   <div class="pagination-block">
       <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
		   {{  $medicinedetails->appends(request()->input())->links('layouts.paginationlinks') }}
	   </div>

	 @endif  --}}