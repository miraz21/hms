@extends('admin.home')
@section('content')
 <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Medicine Name</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('medicinename.edit', $medicinename->id)}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ $medicinename->name }}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>
</div>
</div>
@endsection