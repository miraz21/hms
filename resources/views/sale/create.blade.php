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

            <form action="{{route('sale.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input onclick="multipleRowInsert()" type="button" value="Add" class="btn btn-primary mb-3">

                <div  class="row" id="multipleRow">
                    <div class="mb-3 col-12">
                        <label for="patientName">Patient Name</label>
                        <select class="form-control" name="appointment_id" id="patientName">
                            @foreach($appointment as $item)
                                <option value="{{$item->id}}">{{$item->appoint_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-2">
                        <label for="medicine-1">Medicine</label>
                        <select class="form-select medicine medicineName" name="medicinedetail_id[]"  id="medicine-1" data-id="1">
                            <option value="" selected disabled>Select Medicine</option>
                            @foreach($medicinedetails as $item)
                                <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-2">
                        <label for="price-1" class="form-label">Price</label>
                        <input onchange="totalAmount(1)" type="number" name="price[]" class="form-control" id="price-1" step="0.01">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="quantity-1" class="form-label">Quantity</label>
                        <input onchange="totalAmount(1)" type="number" name="quantity[]" class="form-control" id="quantity-1" >
                    </div>
                    <div class="mb-3 col-2">
                        <label for="amount-1" class="form-label">Amount</label>
                        <input  type="number" name="amount[]" class="form-control" id="amount-1" >
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function totalAmount(id){

            const x = Number($('#price-' + id).val());
            const y = Number($('#quantity-' + id).val());
            $('#amount-' + id).val(x*y);
            console.log(x*y);
        }
        function multipleRowInsert(){
            const len = $('#multipleRow').children().length;

            console.log(len);
            let htmlForm = '';
            htmlForm +='<div class="row" id="inputRows">';
            htmlForm +='    <div class="mb-3 col-2">';
            htmlForm +='<label for="medicinedetail_id-'+ (len+1) +'">Medicine</label>';
            htmlForm +='      <select id="medicinedetail_id-'+ (len+1) +'" class="form-select medicine medicineName medicineId'+ (len+1) +'" name="medicinedetail_id[]" data-id="'+(len+1)+'" onchange="myFunction('+ (len+1) +')">';
            htmlForm +='      <option value="" selected disabled>Select Medicine</option>';
            htmlForm +='      @foreach($medicinedetails as $item)';
            htmlForm +='      <option id="{{$item->id}}" value="{{$item->id}}">{{$item->medicinename->name}}</option>';
            htmlForm +='      @endforeach';
            htmlForm +='      </select>';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3 col-2">';
            htmlForm +='      <label for="price" class="form-label">Price</label>';
            htmlForm +='      <input onchange="totalAmount('+ (len+1) +')" type="number" name="price[]" class="form-control price" id="price-'+(len+1) +'" step="0.01">';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3 col-2">';
            htmlForm +='      <label for="quantity" class="form-label">Quantity</label>';
            htmlForm +='      <input onchange="totalAmount('+ (len+1) +')" type="number" name="quantity[]"    class="form-control" id="quantity-'+ (len+1) +'">';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3 col-2">';
            htmlForm +='      <label for="amount" class="form-label">Amount</label>';
            htmlForm +='      <input  type="number" name="amount[]" class="form-control" id="amount-'+ (len+1) +'" >';
            htmlForm +='    </div>';
            htmlForm += '     <div class="mb-3 col-2">';
            htmlForm += '      <button id="removeRow" type="button" class="btn btn-danger mt-4"> - </button>';
            htmlForm += '    </div>';
            htmlForm +='    </div>';


            $('#multipleRow').append(htmlForm);


            $(".medicineName").select2({
                placeholder: "Select Medicine Name",
                allowClear: true
            }).on("change", function(){
                const medicineID = $(this).val();
                const rowId = $(this).attr('data-id');

                if(medicineID){
                    $.ajax({
                        type:"GET",
                        url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
                        success:function(res){
                            if(res){
                                $("#price-"+rowId).val(res);
                                console.log(res);
                            }
                        }
                    });
                }else{

                    $("#price-"+rowId).empty();
                }

            });
        }
    </script>

    <script>
        $(document).on('click','#removeRow', function () {
            $(this).closest('#inputRows').remove();

        });
    </script>





    <script>
        $(document).ready(function() {
            $('#patientName').select2();
            $(".medicineName").select2({
                placeholder: "Medicine Name",
                allowClear: true
            }).on("change", function(){
                const medicineID = $(this).val();
                const rowId = $(this).attr('data-id');

                if(medicineID){
                    $.ajax({
                        type:"GET",
                        url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
                        success:function(res){
                            if(res){
                                $("#price-"+rowId).val(res);
                                console.log(res);
                            }
                        }
                    });
                }else{

                    $("#price-"+rowId).empty();
                }

            });
        });
    </script>

    <script>
        function myFunction(serial) {
            let medicineID = $(".medicineId"+serial).val();
            if(medicineID){
                $.ajax({
                    type:"GET",
                    url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
                    success:function(res){
                        if(res){
                            $("#price"+serial).val(res);
                        }
                        console.log(res);
                    }
                });
            }else{

                $("#price").empty();
            }
        }
    </script>


@endsection
