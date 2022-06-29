@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Medicine Details</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('medicinedetail.edit',$medicinedetail->id)}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <label for="name" class="form-label">Medicine Name</label>
    <select class="form-select">
      <option value="">{{$medicinedetail->medicinename->name}}</option>
    </select>
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="{{$medicinedetail->price}}" >
  </div>
   {{-- <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount" value="{{$medicinedetail->discount}}" >
  </div> --}}
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$medicinedetail->quantity}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>
@endsection