<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hospital Management</title>
  </head>
  <body>
    <div class="container">
	<div class="row">
	<div class="col-12 col-md-12">
	<h1 style="text-align:center; margin-bottom:50px;">Hospital Daily Report</h1>
	</div>
	</div>
	<div class="row">
	<div class="col-12 col-md-12">
	<p style="margin-left:900px;">Date: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Pharmacy</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>Total Sale</th>
	<th>Receive</th>
	<th>Due</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>{{ $farmecy->sum('total') ?? '' }}</td>
	<td>{{ $farmecy->sum('pay_amount') ?? '' }}</td>
	<td>{{ $farmecy->sum('due_amount') ?? '' }}</td>
	</tr>
	</tbody>
	</table>
	</div>

	
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Pathology</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>Total Test Amount</th>
	<th>Receive</th>
	<th>Due</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>{{ $pathologocal_testPay->sum('total') ?? '' }}</td>
		<td>{{ $pathologocal_testPay->sum('pay_amount') ?? '' }}</td>
		<td>{{ $pathologocal_testPay->sum('due_amount') ?? '' }}</td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Appointment Sheet</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>No of Appointment</th>
	<th>Receive</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>{{ count($appointment) }}</td>
	<td>{{ $appointment->sum('appointment_fee') }}</td>
	</tr>
	</tbody>
	</table>
	</div>
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Hospital General Cost</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>Date</th>
	<th>Total Amount</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>{{ $search_date }}</td>
	<td>{{ $hsCost->sum('amount') ?? '' }}</td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-12 col-md-12">
	<p style="text-align:center;">----Good Day----</p>
	</div>
	</div>
	</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
