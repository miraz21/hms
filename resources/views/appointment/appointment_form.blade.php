<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
    <style>

    @media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
    }
      @page{
    margin: 0;
   }
    </style>

</head>
<body>
<div class="container-fluid page-body-wrapper">
<div class="container" align="center" style="padding-top:100px;">
<h6 style="margin-top: 50px; text-align:center; line-height:.5opx;">Razon Mollah Specialized Heart Center</h6>
<p style="text-align:center; line-height:.5opx;">Faridpur Sadar, Faridpur</p>
<p style="text-align:center; line-height:.5opx;">Help Line +8801700778300</p>
{{-- <a href="{{route('appointment.index')}}"><i class="fa fa-arrow-left"></i>Appointment Document</a> --}}
<p style="text-align:center;">Appointment Document</p>
   <div class="row">
    {{-- <div class="col-3 col-md-3"></div> --}}
    <div class="col-12 col-md-12">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">AGE</th>
      <th scope="col">Problem</th>
      <th scope="col">Doctor</th>
      <th scope="col">Room</th>
      <th scope="col">Amount</th>
      {{-- <th scope="col">Discount</th> --}}
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tfoot>
	<tr>
	 <th></th>
	 <th></th>
	 <th></th>
	 <th></th>
	 <th class="text-right"></th>
    </tr>
  </tfoot>
  <tbody>

    <tr>
      <td >{{$appointment->appoint_name}}</td>
      <td>{{$appointment ->phone}}</td>
      <td>{{$appointment->age}}</td>
      <td>{{$appointment->problem}}</td>
      <td>{{$appointment ->doctor}}</td>
      <td>{{$appointment->room}}</td>

      {{-- @if ($appointment->discount==null)
      $appointment->appointment_fee  
      @else
      <td>{{$appointment->appointment_fee - $appointment->discount}}</td>
      @endif
      <td>{{$appointment->discount}}</td> --}}

      <td>{{$appointment->appointment_fee}}</td>
      <td>{{ \Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y') }}</td>
    </tr>

  </tbody>
</table>
<button id="btnPrint" class="hidden-print " style="margin-top: 20px;">Print</button>
</div>
{{-- <div class="col-3 col-md-3"></div> --}}
</div>
<p style="text-align:center">Welcome</p>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>

<script>
  const $btnPrint = document.querySelector("#btnPrint");
  $btnPrint.addEventListener("click", () => {
    window.print();
  });
</script>

</body>
</html>
