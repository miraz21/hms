@extends('admin.home')
@section('content')
<div class="custom-product">
<div class="col-sm-4">
<a href="#" ></a>
</div>
<div class="col-sm-4">
<div class="trending-wrapper">
<h4>Result for Medicine Details</h4>
@foreach($medicinedetail as $item)
<div class="searched-item">
<!-- <a href="detail/{{$item['id']}}"> -->
<!-- <img class="treanding-image" src="{{$item['gallery']}}"> -->
<div class="">
<p>Medicine Name: {{$item->name}}</p>
<p>Price: {{number_format($item->medicinedetail->price, 2)}}</p>
<p>Quantity: {{number_format($item->medicinedetail->quantity)}}</p> 
</div>
<!-- </a> -->
</div>
@endforeach
</div>
</div>
</div>
@endsection