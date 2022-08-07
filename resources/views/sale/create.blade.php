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

                {{-- <div class="row">
                  <div class="col-md-12"><button type="button" id="btnAddNew" class="btn btn-primary">Add New</button></div>
                </div> --}}
                <div  id="multipleRow">
                    <div class="mb-3">
                        <select class="form-select" name="appointment_id" id="appointment_id">
                            <option value=" ">Select Patient</option>
                            @foreach($appointment as $item)
                                <option value="{{$item->id}}">{{$item->appoint_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select medicine select2" name="medicinedetail_id[]"  id="medicine">
                            <option value="" selected disabled>Select Medicine</option>
                            @foreach($medicinedetails as $item)
                                <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input onchange="totalAmnt(1)" type="number" name="price[]" class="form-control" id="price1" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input onchange="totalAmnt(1)" type="number" name="quantity[]" class="form-control" id="quantity1" >
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input  type="number" name="amount[]" class="form-control" id="amount1" >
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    {{--<script src="http://maxkostinevich.github.io/jquery-multifield/jquery.multifield.min.js"></script>

    <script>
      $('#multipleRow').multifield({
        section: '.group',
        btnAdd:'#btnAddNew',
        btnRemove:'.btnRemove'
      });
      </script> --}}
    <script>
        function totalAmnt(id){

            var x= Number($('#price' + id).val());
            var y= Number($('#quantity' + id).val());
            $('#amount' + id).val(x*y);
            console.log(x*y);
        }
        function multipleRowInsert(){
            var len = $('#multipleRow').children().length;
           
            console.log(len);
            var htmlForm = '';
            htmlForm +='<div id="inputRows">';
            htmlForm +='    <div class="mb-3">';
            htmlForm +='      <select class="form-select medicine medicineId'+ (len+1) +'" name="medicinedetail_id[]" onchange="myFunction('+ (len+1) +')">';
            htmlForm +='      <option value="" selected disabled>Select Medicine</option>';
            htmlForm +='      @foreach($medicinedetails as $item)';
            htmlForm +='      <option id="{{$item->id}}" value="{{$item->id}}">{{$item->medicinename->name}}</option>';
            htmlForm +='      @endforeach';
            htmlForm +='      </select>';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3">';
            htmlForm +='      <label for="price" class="form-label">Price</label>';
            htmlForm +='      <input onchange="totalAmnt('+ (len+1) +')" type="number" name="price[]" class="form-control price" id="price'+(len+1) +'" step="0.01">';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3">';
            htmlForm +='      <label for="quantity" class="form-label">Quantity</label>';
            htmlForm +='      <input onchange="totalAmnt('+ (len+1) +')" type="number" name="quantity[]"    class="form-control" id="quantity'+ (len+1) +'">';
            htmlForm +='    </div>';
            htmlForm +='    <div class="mb-3">';
            htmlForm +='      <label for="amount" class="form-label">Amount</label>';
            htmlForm +='      <input  type="number" name="amount[]" class="form-control" id="amount'+ (len+1) +'" >';
            htmlForm +='    </div>';
            htmlForm += '     <div class="mb-3">';
            htmlForm += '      <button id="removeRow" type="button" class="btn btn-danger"> - </button>';
            htmlForm += '    </div>';
            htmlForm +='    </div>';

         
            $('#multipleRow').append(htmlForm);

            // $(".medicineId"+(len+1)).select2({
            //     placeholder: "select Medicine",
            //     allowClear: true
            // });
            
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
    {{--
    <script type="text/javascript">
      $(document).ready(function(){
        $('#medicine').select2({
          placeholder: "select Medicine",
          allowClear: true
        });
      });
      </script> --}}


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $("[id=medicine]").select2({
                placeholder: "select Medicine",
                allowClear: true
            }).on("change", function(){
                var medicineID = $(this).val();

                if(medicineID){
                    $.ajax({
                        type:"GET",
                        url:"{{url('getprice')}}?medicinedetail_id="+medicineID,
                        success:function(res){
                            if(res){

                                $("#price1").val(res);
                                console.log(res);


                            }else{

                            }
                        }
                    });
                }else{

                    $("#price").empty();
                }

            });
        });
    </script>

    <script>
        function myFunction(serial) {

            //var medicineID = document.getElementById("mdata").value;
            let medicineID = $(".medicineId"+serial).val();

            // console.log(selectElement.options[selectElement.selectedIndex]);
            // console.log(x);

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
