@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Create Test Report</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form action="{{route('pathological.store')}}" method="post">
    @csrf
        <input onclick="multipleRowInsert()" type="button" value="Add" class="btn btn-primary mb-3">
        <div class="row">
            <div class="mb-3 col-4">
                <label for="appointment_id">Patient Name</label>
                <select class="form-select" name="appointment_id" id="appointment_id">
                    <option value="">Select Patient</option>
                    @foreach($appointment as $item)
                        <option value="{{$item->id}}">{{$item->appoint_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" readonly class="form-control" id="phone">
            </div>

            <div class="mb-3 col-4">
                <label for="age" class="form-label">AGE</label>
                <input type="text" readonly class="form-control" id="age">
            </div>
        </div>



      <div id="multipleRow">
          <div class="row">
            <div class="mb-3 col-5">
                <label for="test-1" class="form-label">Test Name</label>
                <select class="form-select test select2 testSelect" name="test_info_id[]" id="test-1">
                <option value="">Select Test & Price</option>
                @foreach($testinfo as $item)
                <option value="{{$item->id}}">{{$item->test}} --- {{$item->price}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 col-5">
                <label for="discount-1" class="form-label">Discount</label>
                <input type="number" name="discount[]" class="form-control" id="discount-1">
            </div>
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>

<script>
  function multipleRowInsert(){
      const len = $('#multipleRow').children().length;
      console.log(len);
      let htmlForm = '';
      htmlForm += '<div class="row" id="inputRows">';
    htmlForm += '    <div class="mb-3 col-5">';
    htmlForm += '        <label for="test-'+(len+1)+'" class="form-label">Test Name</label>';
    htmlForm += '      <select class="form-select testSelect" name="test_info_id[]" id="test-'+(len+1)+'">';
    htmlForm += '      <option value=" ">Select Test & Price</option>';
    htmlForm += '    @foreach($testinfo as $item)';
    htmlForm += '    <option value="{{$item->id}}">{{$item->test}} --- {{$item->price}}</option>';
    htmlForm += '    @endforeach';
    htmlForm += '      </select>';
    htmlForm += '    </div>';
    htmlForm += '     <div class="mb-3 col-5">';
    htmlForm += '      <label for="discount-'+(len+1)+'" class="form-label">Discount</label>';
    htmlForm += '      <input type="number" name="discount[]" class="form-control" id="discount-'+(len+1)+'">';
    htmlForm += '    </div>';
    htmlForm += '     <div class="mb-3 col-2">';
    htmlForm += '      <button id="removeRow" type="button" class="btn btn-danger"> - </button>';
    htmlForm += '    </div>';
    htmlForm += '  </div>';
    $('#multipleRow').append(htmlForm);
    console.log('ok');
      $('.testSelect').select2({
          placeholder: "select Test",
          allowClear: true
      });

  }
</script>

<script>
  $(document).on('click','#removeRow', function () {
    $(this).closest('#inputRows').remove();

  });
</script>

<input type="hidden" name="_token" value="A3bgtRtqUuQ4rWvTodMaSPyBACYOYlAlJcTGf6br">

{{-- <script type=text/javascript>
  $('#appointment_id').change(function(){
  var appointment_id = $(this).val();
  if(appointment_id){
    $.ajax({
      type:"GET",
      url:"{{url('getappointment')}}?id="+appointment_id,
      success:function(res){
      if(res){
       $("#age").val(res.age);
       $("#phone").val(res.phone);

      }else{

      }
      }
    });
  }else{

    $("#age").empty();
    $("#phone").empty();
  }
  });

</script> --}}

<script type="text/javascript">
  $(document).ready(function(){
    $('#appointment_id').select2({
      placeholder: "select Patient",
      allowClear: true

    }).on("change", function(){
        const appointment_id = $(this).val();
        if(appointment_id){
            $.ajax({
              type:"GET",
              url:"{{url('getappointment')}}?id="+appointment_id,
              success:function(res){
              if(res){
               $("#age").val(res.age);
               $("#phone").val(res.phone);

              }else{

              }
              }
            });
       }else{

        $("#age").empty();
        $("#phone").empty();
      }
    });
  });
  </script>


<script type="text/javascript">
  $(document).ready(function(){
      $('.testSelect').select2({
          placeholder: "select Test",
          allowClear: true
      });
  });
</script>

@endsection
