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
	<h1 style="text-align:center; margin-bottom:50px; mt-3">Patient Report</h1>
	</div>
	</div>
	<div class="row">
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Patient Name: {{ $ap->appoint_name }}</p>
	<p style="text-align:center;">Phone: {{ $ap->phone }}</p>
	</div>
	<div class="col-6 col-md-6">
	<p>Appointment Date: {{ $ap->date }}</p>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Test Report</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>SL No</th>
	<th>Test</th>
	<th>Price</th>
	</tr>
	</thead>
	<tfoot>
    <tr>
        <th></th>
        <th></th>
        <th>Total: {{ $test_total ?? '' }}
			<th>
	
    </tr>
	</tfoot>
	<tbody>
	<tr>
        @foreach ($tests as $test)
        <tr>
        <th>{{ $loop->iteration }}</th>
        <th>{{ $test->testinfo->test}}</th>
        <th>Price: {{ $test->testinfo->price - $test->discount ?? '' }}</th>
        </tr>
        @endforeach
	</tr>
	</tbody>
	</table>
	</div>
	
	<div class="col-6 col-md-6">
	<p style="text-align:center;">Pharmacy Report</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>SL No</th>
	<th>Medicine</th>
	<th>Quantity</th>
	<th>Amount</th>
	</tr>
	</thead>
	<tfoot>	
    <tr>
		<th></th>
		<th></th>
		<th></th>
		<th>Total:{{ $medicines->sum('amount') ?? '' }}</th>
    </tr>
	</tfoot>
	<tbody>
	<tr>
		<tr>
			@foreach ($medicines as $m)
			<tr>
			<th>{{ $loop->iteration }}</th>
			<th>{{ $m->medicinedetail->medicinename->name ?? '' }}</th>
			<th>{{ $m->quantity ?? '' }}</th>
			<th>{{ $m->amount ?? '' }}</th>
			</tr>
			@endforeach
		</tr>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-2 col-md-2"></div>
	<div class="col-8 col-md-8">
	<p style="text-align:center;">Patient Payment Report</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>Total: </th>
	<th>Payment: </th>
	<th>Due: </th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>{{ $grand_total ?? '' }}</td>
	<td>{{ $total_pay ?? '' }}</td>
	<td> {{ $due_amount ?? '' }}</td>
	</tr>
	</tbody>
	</table>
	</div>
	<div class="col-2 col-md-2"></div>
	</div>
	<div class="row">
	<div class="col-12 col-md-12">

		@if ($due_amount == 0)
		<p style="text-align:center;">----Paid----</p>
		@endif
	
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
