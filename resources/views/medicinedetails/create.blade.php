@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Create New Medicine</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('medicinedetail.create')}}" method="post" enctype="multipart/form-data">
@csrf 
   <div class="mb-3">
    <select class="form-select" name="medicinename_id" id="medicinename_id">
    <option value=" "></option>
    @foreach($medicinename as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
    </select>
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" step="0.01">
  </div>
   {{-- <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount" step="0.01">
  </div> --}}
     <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#medicinename_id').select2({
      placeholder: "select Medicine",
      allowClear: true
    });
  });
  </script>

@endsection