@extends('saledetails.sale')
@section('content')
<center>
<br><br>
<a href="{{ url('/sale_prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1>Sale List </h1>
<table class="table" >
<tr>
<th scope="col">ID</th>
<th scope="col">Medicine Name</th>
<th scope="col">Price</th>
<th scope="col">Qty</th>
<th scope="col">Amount</th>
</tr>
<tr>
<th scope="row">{{ $sale->id }}</th>
<td>{{$sale->name}}</td>
<td>{{number_format($sale->price)}}BDT</td>
<td>{{number_format($sale->quantity)}}</td>
<td>{{number_format($sale->amount)}}BDT</td>
</tr>
@endforeach
</center>
@endsection