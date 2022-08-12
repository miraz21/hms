@extends('patients.patientadmit')
@section('content')
<center>
<br><br>
<a href="{{ url('/patient_prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1> Patient Details </h1>
<table class="table" >
<tr>
<th scope="col">Patient</th>
<th scope="col">Phone</th>
<th scope="col">Room</th>
<th scope="col">Reason</th>
<th scope="col">Total</th>
<th scope="col">Payment</th>
<th scope="col">Due</th>
</tr>
@foreach($patients as $key=>$patient)
<tr>
<td>{{$patient->name}}</td>
<td>{{$patient->phone}}</td>
<td>{{$patient->room}}</td>
<td>{{$patient->reason}}</td>
<td>{{number_format($patient->total)}}</td>
<td>{{number_format($patient->payment)}}</td>
<td>{{number_format($patient->due)}}</td>
</tr>
@endforeach
</center>
@endsection