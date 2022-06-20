@extends('admin.home')
@section('content')
 <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Hospital Cost</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('hscost.store')}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="mb-3">
    <label for="reason" class="form-label">Reason</label>
    <input type="text" name="reason" class="form-control" id="reason">
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" name="amount" class="form-control" id="amount">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection