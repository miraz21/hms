@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add New Medicine</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('buymedicine.store')}}" method="post" enctype="multipart/form-data">
@csrf 
   <div class="mb-3">
    <select class="form-select" name="medicinedetail_id" id="medicinedetail_id">
    <option value=" ">Select Medicine</option>
    @foreach($medicinedetails as $item)
    <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" >
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" name="amount" class="form-control" id="amount">
  </div>
   {{-- <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div> --}}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#medicinedetail_id').select2({
      Placeholder: "Select Medicine",
      allowClear: true
    });
  });
  </script>

@endsection