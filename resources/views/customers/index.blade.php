@extends('admin.home')
@section('content')
    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Payment Document </h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{ route('customer.create') }}"> <i class="fa fa-plus"></i> Add Customer Payment
            </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Sale Document</th>
                            <th>SubTotal</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Due</th>
                            <th>Action</th>
                            <!-- <th class="text-right">Actions</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th class="text-right"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td> {{ $customer->id }} </td>
                                <td> {{ $customer->appointment->appoint_name }} </td>
                                <td> {{ $customer->appointment->phone }} </td>
                                <td> {{ $customer->sale->invoice_no }} </td>
                                <td> {{ $customer->sale->total }} </td>
                                <td> {{ $customer->discount }} </td>
                                <td> {{ $customer->sale->total - $customer->discount }} </td>
                                <td>
                                    {{ $customer->pay_amount }}
                                    <input style="display: none;" class="form-control" type="number"
                                        id="{{ 'payment_' . $customer->id }}" name="amount" placeholder="Enter Amount">
                                </td>
                                <td> {{ $customer->due_amount }} </td>
                                <td class="text-right">
                                    @if ($customer->due_amount > 0)
                                        <button onclick="showPayment({{ $customer->id }})"
                                            id="{{ 'paymentAdd_' . $customer->id }}" class="btn btn-primary">Payment
                                            Add</button>
                                        <button onclick="submitPayment({{ $customer->id }})" style="display: none;" id="{{ 'paymentSave_' . $customer->id }}" class="btn btn-success  btn-block  btn-sm">Save</button>
                                        <button onclick="hidePayment({{ $customer->id }})" style="display: none;" id="{{ 'paymentCancel_' . $customer->id }}"
                                            class="btn btn-danger btn-sm  btn-block">Cancel</button>
                                    @else
                                        <a class="btn btn-success" href="#">paid</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customers->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPayment(id) {
            $('#paymentAdd_' + id).hide();
            $('#paymentSave_' + id).show();
            $('#payment_' + id).show();
            $('#paymentCancel_' + id).show();
        }
        function hidePayment(id) {
            $('#paymentAdd_' + id).show();
            $('#paymentSave_' + id).hide();
            $('#payment_' + id).hide();
            $('#paymentCancel_' + id).hide();
        }
        function submitPayment(id) {
            $.ajax({
            type:"POST",
            url:"{{url('/add_payment')}}",
            data: {id:id, amount: $('#payment_' + id).val()},
            success:function(res){
                if(res.status == 1){
                    location.reload();
                }else{
                    alert(res.data);
                    console.log(res);
                    location.reload();
                }
            }
            });

            // Route::post('/customers/add_payment',[App\Http\Controllers\CustomerController::class, 'add_payment'])->name('customer.add_payment');

            // $('#paymentAdd_' + id).show();
            // $('#paymentSave_' + id).hide();
            // $('#payment_' + id).hide();
            // $('#paymentCancel_' + id).hide();
        }
        $(document).ready(function() {
            // $("#paymentAdd").click(function(){
            //     $(this).hide();
            //     // $('#payment_amt').hide();
            //     $('#paymentSave').show();
            //     $('#payment').show();
            //     $('#paymentCancel').show();
            // });
            // $("#paymentCancel").click(function(){
            //     $(this).hide();
            //     // $('#payment_amt').show();
            //     $('#paymentAdd').show();
            //     $('#paymentSave').hide();
            //     $('#payment').hide();
            // });
        });
    </script>
@endsection
