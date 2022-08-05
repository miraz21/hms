@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Sales </h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@forelse ($q_datas as $item)

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ $item->medicinename->name }}</strong>  Quantity is Running low. {{ $item->quantity }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@empty

@endforelse

<form action="{{route('saledetail.store')}}" method="post" enctype="multipart/form-data">
@csrf
<input onclick="multipleRowInsert()" type="button" value="Add" class="btn btn-primary mb-3">

    {{-- <div class="row">
      <div class="col-md-12"><button type="button" id="btnAddNew" class="btn btn-primary">Add New</button></div>
    </div> --}}
    <div class="row">
        <div class="mb-3 col-2">
          <label for="date" class="form-label">Date</label>
          <input type="date" name="date" class="form-control" id="date" >
        </div>
        <div class="mb-3 col-2">
            <label for="appointment_id" class="form-label">Patient</label>
          <select class="form-select" name="appointment_id" id="appointment_id">
              <option value=" ">Select Patient</option>
              @foreach($appointment as $item)
              <option value="{{$item->id}}">{{$item->appoint_name}}</option>
              @endforeach
          </select>
        </div>
        <div class="col-6 h3 text-right">
            Total Amount: <span id="totalAmount" class="text-danger">0</span>
        </div>
    </div>
    <div id="multipleRow" >
        <div class="row" data-id="1">
            <div class="mb-3 col-3">
                <label for="medicine">Medicine</label><select class="form-select medicine select2 medicine-select2" name="medicinedetail_id[]" id="medicine-1">
              <option value="" selected disabled>Select Medicine</option>
              @foreach($medicinedetails as $item)
              <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="mb-3 col-3">
              <label for="price1" class="form-label">Price</label>
              <input onchange="totalAmount(1)" type="number" name="price[]" class="form-control" id="price1" step="0.01">
            </div>
            <div class="mb-3 col-3">
              <label for="quantity1" class="form-label">Quantity</label>
              <input onchange="totalAmount(1)" type="number" name="quantity[]" class="form-control" id="quantity1" >
            </div>
            <div class="mb-3 col-2">
              <label for="amount1" class="form-label">Amount</label>
              <input  type="number" name="amount[]" class="form-control amount" id="amount1" >
            </div>
        </div>
    </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>



<script>
  function totalAmount(id){

      const x = Number($('#price' + id).val());
      const y = Number($('#quantity' + id).val());
      $('#amount' + id).val(x*y);
      grandTotal();
    console.log(x*y);
  }
  function multipleRowInsert(){
      const len = $('#multipleRow').children().length;

      let htmlForm = '';
      htmlForm +='<div id="inputRows" class="row" data-id="'+ (len+1) +'">';
    htmlForm +='    <div class="mb-3 col-3">';
    htmlForm +='      <select class="form-select medicine medicineId medicine-select2" name="medicinedetail_id[]" id="medicine-'+(len+1)+'">';
    htmlForm +='      <option value="" selected disabled>Select Medicine</option>';
    htmlForm +='      @foreach($medicinedetails as $item)';
    htmlForm +='      <option id="{{$item->id}}" value="{{$item->id}}">{{$item->medicinename->name}}</option>';
    htmlForm +='      @endforeach';
    htmlForm +='      </select>';
    htmlForm +='    </div>';
    htmlForm +='    <div class="mb-3 col-3">';
    htmlForm +='      <input onchange="totalAmount('+ (len+1) +')" type="number" name="price[]" class="form-control price" id="price'+ (len+1) +'" step="0.01">';
    htmlForm +='    </div>';
    htmlForm +='    <div class="mb-3 col-3">';

    htmlForm +='      <input onchange="totalAmount('+ (len+1) +')" type="number" name="quantity[]"    class="form-control" id="quantity'+ (len+1) +'">';
    htmlForm +='    </div>';
    htmlForm +='    <div class="mb-3 col-2">';

    htmlForm +='      <input  type="number" name="amount[]" class="form-control amount" id="amount'+ (len+1) +'" >';
    htmlForm +='    </div>';
    htmlForm += '     <div class="mb-3 col-1">';
    htmlForm += '      <button id="removeRow" type="button" class="btn btn-danger"> - </button>';
    htmlForm += '    </div>';
    htmlForm +='    </div>';
    $('#multipleRow').append(htmlForm);


      $(".medicine-select2").select2({
          placeholder: "select Medicine",
          allowClear: true
      }).on("change", function(){
          const medicineID = $(this).val();
          console.error(this, medicineID);
          if(medicineID){
              $.ajax({
                  type:"GET",
                  url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
                  success:function(res){
                      if(res){
                          $("#price"+(len+1)).val(res);
                          console.warn(res);
                      }
                  }
              });
          }else{
              $("#price"+(len+1)).empty();
          }

      });










    console.log('ok');
  }
</script>

<script>
  $(document).on('click','#removeRow', function () {
    $(this).closest('#inputRows').remove();
    grandTotal();

  });
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#appointment_id').select2({
      placeholder: "select Patient",
      allowClear: true
    });
  });
  const grandTotal = () => {
    let total = 0;
    $('.amount').each(function(){
      total += Number($(this).val());
    });
    $('#totalAmount').text(total);
  }
  </script>




<script>
$(document).ready(function() {

    $(".medicine-select2").select2({
      placeholder: "select Medicine",
      allowClear: true
    }).on("change", function(){
        const medicineID = $(this).val();
        if(medicineID){
            $.ajax({
              type:"GET",
              url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
              success:function(res){
                  if(res){
                    $("#price1").val(res);
                    console.error(res);
                  }
              }
            });
        }else{
            $("#price1").empty();
        }

    });
});
</script>

@endsection
