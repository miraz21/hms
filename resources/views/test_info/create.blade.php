@extends('admin.home')
@section('content')
 <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Create Test Info</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('testinfo.store')}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <label for="test" class="form-label">Test</label>
    <input type="text" name="test" class="form-control" id="test">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price">
  </div>
  {{-- <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount">
  </div> --}}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection