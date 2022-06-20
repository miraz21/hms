@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Return Medicine </h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('returnmedicine.create')}}" method="post" enctype="multipart/form-data">
@csrf 
<input onclick="multipleRowInsert()" type="button" value="Add" class="btn btn-primary mb-3">
  <div id="multipleRow">
<div>
<div class="mb-3">
    <select class="form-select" name="appointment_id" id="appointment_id">
    <option value=" ">Select Patient</option>
    @foreach($appointment as $item)
    <option value="{{$item->id}}">{{$item->appoint_name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <select class="form-select" name="medicinedetail_id[]" id="medicinedetail_id">
    <option value=" ">Select Medicine</option>
    @foreach($medicinedetails as $item)
    <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
    @endforeach
    </select>
  </div>
   <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity[]" class="form-control" id="quantity">
  </div>
   <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div>
</div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

<script>
  function multipleRowInsert(){
    var len = $('#multipleRow').children().length;
    console.log(len);
    var htmlForm = ''; 
    htmlForm += '<div id="inputRows">';
    htmlForm += '    <div class="mb-3">';
    htmlForm += '      <select class="form-select" name="medicinedetail_id[]" id="medicinedetail_id">';
    htmlForm += '      <option value=" ">Select Medicine Name</option>';
    htmlForm += '    @foreach($medicinedetails as $item)';
    htmlForm += '    <option value="{{$item->id}}">{{$item->medicinename->name}}</option>';
    htmlForm += '    @endforeach';
    htmlForm += '      </select>';
    htmlForm += '    </div>';
    htmlForm +='    <div class="mb-3">';
    htmlForm +='      <label for="quantity" class="form-label">Quantity</label>';
    htmlForm +='      <input onchange="totalAmnt('+ (len+1) +')" type="number" name="quantity[]" class="form-control" id="quantity'+ (len+1) +'">';
    htmlForm +='    </div>';
    htmlForm += '     <div class="mb-3">';
    htmlForm += '      <button id="removeRow" type="button" class="btn btn-danger"> - </button>';
    htmlForm += '    </div>';
    htmlForm += '  </div>';
    $('#multipleRow').append(htmlForm);
    console.log('ok');

  }
</script>

<script>
  $(document).on('click','#removeRow', function () { 
    $(this).closest('#inputRows').remove();
    
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#appointment_id').select2({
      placeholder: "select Patient",
      allowClear: true
    });
  });
  </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#medicinedetail_id').select2({
      placeholder: "select Medicine",
      allowClear: true
    });
  });
  </script>

@endsection