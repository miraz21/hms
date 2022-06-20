@extends('admin.home')
@section('content')
 <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Customer Payment</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('addcustomerbalance.store')}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <select class="form-select" name="appointment_id" id="appointment_id">
    <option value=" ">Select Patient Name</option>
    @foreach($appointment as $item)
    <option value="{{$item->id}}">{{$item->appoint_name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="total" class="form-label">Total</label>
    <input type="number" name="total" class="form-control" id="total">
  </div>
  <div class="mb-3">
    <label for="pay_amount" class="form-label">Payment Amount</label>
    <input type="number" name="pay_amount" class="form-control" id="pay_amount">
  </div>

  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#appointment_id').select2({
      placeholder: "select Patient",
      allowClear: true
    });
  });
  </script>

@endsection