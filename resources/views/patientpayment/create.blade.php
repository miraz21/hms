@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Patient Payment</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('patientpayment.store')}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <select class="form-control" name="appointment_id" id="appointment_id">
    <option value=" ">Select Patient</option>
    @foreach($appointment as $item)
    <option value="{{$item->id}}">{{$item->appoint_name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" readonly class="form-control" id="phone">
  </div>
   <div class="mb-3">
    <label for="total" class="form-label">Total</label>
    <input type="number" name="total" class="form-control" id="total" >
  </div>
  <div class="mb-3">
    <label for="pay_amount" class="form-label">Payment</label>
    <input type="number" name="pay_amount" class="form-control" id="pay_amount" >
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $("[id=appointment_id]").select2({
      placeholder: "select patient",
      allowClear: true
    }).on('change',function(){
      var appointment_id = $(this).val();  

  if(appointment_id){
    $.ajax({
      type:"GET",
      url:"{{url('getpatient')}}?id="+appointment_id,
      success:function(res){        
      if(res){
       $("#phone").val(res.phone);
    
      }else{
      
      }
      }
    });
  }else{
    
    $("#phone").empty();
  }   
    });
  });
  </script>

@endsection