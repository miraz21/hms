@extends('admin.home')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                <div class="row">
                    <div class="mb-3 col-2 input-group">
                        <label for="date" class="input-group-prepend">
                            <span class="input-group-text">Date</span>
                        </label>
                        <input type="date" name="date" class="form-control" id="date" >
                    </div>
                    <div class="mb-3 col-2">
                        <select class="form-select" name="appointment_id" id="appointment_id">
                            <option value=" ">Select Patient</option>
                            @foreach($appointment as $item)
                                <option value="{{$item->id}}">{{$item->appoint_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="multipleRow"></div>





                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>





    <script>
        function multipleRowInsert() {
            alert('hello');
            $("#multipleRow").append(
                "<div>ok</div>"

            );
        }
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

    <script>
        $(document).ready(function() {
            $(".medicine").select2({
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
                                console.log(res);
                            }
                        }
                    });
                }else{
                    $("#price").empty();
                }

            });
        });
    </script>




@endsection
