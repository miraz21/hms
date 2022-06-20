@extends('pathological_test.testreport')
@section('content')
<center>
<br><br>
<a href="{{ url('/test_prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1> Test Details </h1>
<table class="table" >
<tr>
<th scope="col">SL No</th>
<th scope="col">Test Name</th>
<th scope="col">Price</th>
</tr>
@foreach($pathologicaltests as $key=>$pathologicaltest)
<tr>
<th scope="row">{{ $pathologicaltest->id }}</th>
<td>{{$pathologicaltest->test}}</td>
<td>{{number_format($pathologicaltest->price)}}</td>
</tr>
@endforeach
</center>
@endsection