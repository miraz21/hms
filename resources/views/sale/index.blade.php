@extends('admin.home')
@section('content')
    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Sales </h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{ route('sale.create') }}"> <i class="fa fa-plus"></i> Add Sale </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sales as $key=> $sale)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$sale->appointment->appoint_name}}</td>
                            <td>{{number_format($sale->total, 2)}}</td>
                            <td>
                                <a href="{{route('sale.print',$sale->id)}}" target="_blank" class="btn btn-sm btn-info">Print</a>
                                <a href="{{route('sale.show',$sale->id)}}" class="btn btn-sm btn-info">More Info</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>

                        <th></th>
                        <th class="text-right">Total</th>
                        <th >{{ $sales->sum('total') }}</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
{{--                {{$sale->links('pagination::bootstrap-4')}}--}}
            </div>
        </div>
    </div>
@endsection
