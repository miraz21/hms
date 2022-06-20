@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Sale Document</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('saledetail.edit',$saledetail->id)}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <label for="title" class="form-label">Customer Name</label>
    <select class="form-select">
      <option value="">{{$saledetail->name}}</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Medicine Name</label>
    <select class="form-select">
      <option value="">{{$saledetail->medicinename->name}}</option>
    </select>
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="{{$saledetail->price}}">
  </div>
   <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$saledetail->quantity}}">
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label"> Amount </label>
    <input type="number" name="amount" class="form-control" id="amount" value="{{$saledetail->amount}}">
  </div>
   <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" value="{{$saledetail->date}}" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection